<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Show subscription required page
     */
    public function required()
    {
        if (Auth::check() && Auth::user()->subscribed('default')) {
            return redirect()->route('dashboard');
        }
        
        return view('subscription.required');
    }

    /**
     * Show checkout form page
     */
    public function showCheckout(Request $request)
    {
        // Check if user wants to change email (logout parameter)
        if ($request->has('logout') && Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('subscription.checkout');
        }
        
        $user = auth()->user();
        
        // Refresh user data to get latest subscription status
        if ($user) {
            $user->refresh();
        }
        
        // If already subscribed, redirect to dashboard with message
        if ($user && $user->subscribed('default')) {
            return redirect()->route('dashboard')->with('success', 'You already have an active subscription! Welcome back.');
        }

        // If user is logged in but not subscribed, show them they need to subscribe
        if ($user && !$user->subscribed('default')) {
            // User exists but no subscription - show checkout
            return view('subscription.checkout')->with('user', $user);
        }

        // Guest user - show checkout form with fresh session
        $request->session()->regenerateToken();
        return view('subscription.checkout');
    }

    /**
     * Create Stripe checkout session
     */
    public function checkout(Request $request)
    {
        $user = $request->user();
        
        // If already subscribed, redirect to dashboard
        if ($user && $user->subscribed('default')) {
            return redirect()->route('dashboard');
        }

        // Create or get user if not authenticated
        if (!$user) {
            $request->validate([
                'email' => 'required|email',
                'name' => 'required|string|max:255',
            ]);

            // Check if user already exists
            $existingUser = \App\Models\User::where('email', $request->email)->first();
            
            if ($existingUser) {
                // User exists - check if they have completed subscription + LVR
                if ($existingUser->subscribed('default') && $existingUser->lvr_submitted) {
                    // Fully registered user - log them in and redirect to dashboard
                    Auth::login($existingUser);
                    return redirect()->route('dashboard')->with('success', 'Welcome back! You are now logged in.');
                } elseif ($existingUser->subscribed('default') && !$existingUser->lvr_submitted) {
                    // Has subscription but no LVR - log them in and redirect to LVR form
                    Auth::login($existingUser);
                    return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
                } else {
                    // User exists but no subscription - continue to payment
                    $user = $existingUser;
                    Auth::login($user);
                }
            } else {
                // New user - create account
                $password = \Illuminate\Support\Str::random(16);
                
                $user = \App\Models\User::create([
                    'email' => $request->email,
                    'name' => $request->name, 
                    'password' => bcrypt($password),
                    'email_verified_at' => now(),
                ]);
                
                Auth::login($user);
            }
            
            // Clear any existing Stripe customer ID to force fresh checkout with correct email
            if ($user->stripe_id) {
                $user->update(['stripe_id' => null]);
            }
        } else {
            // User is already logged in - check if they're trying to use a different email
            if ($request->has('email') && $request->email !== $user->email) {
                // Different email provided - log out current user and create/login new user
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                $request->validate([
                    'email' => 'required|email',
                    'name' => 'required|string|max:255',
                ]);
                
                // Check if this email already exists
                $existingUser = \App\Models\User::where('email', $request->email)->first();
                
                if ($existingUser) {
                    // User exists - check completion status
                    if ($existingUser->subscribed('default') && $existingUser->lvr_submitted) {
                        Auth::login($existingUser);
                        return redirect()->route('dashboard')->with('success', 'Welcome back! You are now logged in.');
                    } elseif ($existingUser->subscribed('default') && !$existingUser->lvr_submitted) {
                        Auth::login($existingUser);
                        return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
                    } else {
                        $user = $existingUser;
                        Auth::login($user);
                    }
                } else {
                    // New user
                    $password = \Illuminate\Support\Str::random(16);
                    
                    $user = \App\Models\User::create([
                        'email' => $request->email,
                        'name' => $request->name,
                        'password' => bcrypt($password),
                        'email_verified_at' => now(),
                    ]);
                    
                    Auth::login($user);
                }
                
                // Clear any existing Stripe customer ID
                if ($user->stripe_id) {
                    $user->update(['stripe_id' => null]);
                }
            }
        }

        try {
            // Clear any existing Stripe customer ID to force fresh checkout
            if ($user->stripe_id) {
                $user->update(['stripe_id' => null]);
            }

            // Create checkout session with email prefilled
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            
            $sessionParams = [
                // Prefill customer email
                'customer_email' => $user->email,
                'line_items' => [[
                    'price' => config('services.stripe.price_id'),
                    'quantity' => 1,
                ]],
                'mode' => 'subscription',
                'success_url' => route('subscription.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('subscription.checkout'),
                'billing_address_collection' => 'auto',
                'phone_number_collection' => [
                    'enabled' => false,
                ],
                'allow_promotion_codes' => false,
                'consent_collection' => [
                    'terms_of_service' => 'none',
                ],
                'payment_method_types' => ['card'], // Only card, no Link
            ];
            
            $checkoutSession = \Stripe\Checkout\Session::create($sessionParams);

            return redirect($checkoutSession->url);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error('Stripe checkout error: ' . $e->getMessage());
            
            // If currency conflict, clear the customer and try again
            if (str_contains($e->getMessage(), 'cannot combine currencies')) {
                // Remove stripe_id to create a new customer
                $user->update(['stripe_id' => null]);
                
                \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
                
                $checkoutSession = \Stripe\Checkout\Session::create([
                    'customer_email' => $user->email,
                    'line_items' => [[
                        'price' => config('services.stripe.price_id'),
                        'quantity' => 1,
                    ]],
                    'mode' => 'subscription',
                    'success_url' => route('subscription.success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('home'),
                    'billing_address_collection' => 'auto',
                    'phone_number_collection' => [
                        'enabled' => false,
                    ],
                    'allow_promotion_codes' => false,
                    'consent_collection' => [
                        'terms_of_service' => 'none',
                    ],
                    'payment_method_types' => ['card'], // Only card, no Link
                ]);

                return redirect($checkoutSession->url);
            }
            
            return redirect()->route('subscription.checkout')->with('error', 'Unable to create checkout session. Please try again.');
        } catch (\Exception $e) {
            \Log::error('Checkout error: ' . $e->getMessage());
            return redirect()->route('subscription.checkout')->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Handle successful subscription
     */
    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        // If no session_id, check if user is already logged in
        if (!$sessionId) {
            if (Auth::check()) {
                $user = Auth::user();

                // If already has subscription and LVR submitted, go to dashboard
                if ($user->subscribed('default') && $user->lvr_submitted) {
                    return redirect()->route('dashboard')->with('success', 'Welcome back!');
                }

                // If has subscription but no LVR, go to LVR form
                if ($user->subscribed('default') && !$user->lvr_submitted) {
                    return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
                }

                // No subscription, redirect to checkout
                return redirect()->route('subscription.checkout')->with('info', 'Please complete your subscription.');
            }

            // Not logged in and no session_id, redirect to home
            return redirect()->route('home')->with('info', 'Please subscribe to access the platform.');
        }

        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            $session = \Stripe\Checkout\Session::retrieve([
                'id' => $sessionId,
                'expand' => ['subscription', 'customer']
            ]);

            // Check if session is completed
            if ($session->status !== 'complete') {
                return redirect()->route('subscription.checkout')->with('error', 'Payment session is not complete. Please try again.');
            }

            // Find or create user by email
            $customerEmail = $session->customer_details->email ?? $session->customer->email ?? null;
            
            if (!$customerEmail) {
                \Log::error('No customer email found in Stripe session: ' . $sessionId);
                return redirect()->route('subscription.checkout')->with('error', 'Unable to retrieve customer information. Please contact support.');
            }

            $user = \App\Models\User::where('email', $customerEmail)->first();

            if (!$user) {
                // Create user if doesn't exist
                $user = \App\Models\User::create([
                    'name' => $session->customer_details->name ?? 'Customer',
                    'email' => $customerEmail,
                    'password' => bcrypt(\Illuminate\Support\Str::random(16)),
                    'email_verified_at' => now(),
                    'stripe_id' => $session->customer,
                ]);
                
                \Log::info('Created new user from Stripe session: ' . $user->email);
            } else {
                // Update stripe_id if not set
                if (!$user->stripe_id) {
                    $user->update(['stripe_id' => $session->customer]);
                }
            }

            // Create subscription record in database
            if ($session->subscription) {
                $stripeSubscription = is_string($session->subscription) 
                    ? \Stripe\Subscription::retrieve($session->subscription)
                    : $session->subscription;

                // Check if subscription already exists
                $existingSubscription = $user->subscriptions()
                    ->where('stripe_id', $stripeSubscription->id)
                    ->first();

                if (!$existingSubscription) {
                    $user->subscriptions()->create([
                        'type' => 'default',
                        'stripe_id' => $stripeSubscription->id,
                        'stripe_status' => $stripeSubscription->status,
                        'stripe_price' => $stripeSubscription->items->data[0]->price->id,
                        'quantity' => 1,
                        'trial_ends_at' => null,
                        'ends_at' => null,
                        'organization_id' => $user->organization_id,
                        'branch_id' => $user->branch_id,
                    ]);
                    
                    \Log::info('Created subscription for user: ' . $user->email . ' | Subscription ID: ' . $stripeSubscription->id);
                } else {
                    \Log::info('Subscription already exists for user: ' . $user->email);
                }

                $user->refresh();
            }

            // Log the user in if not already authenticated
            if (!Auth::check()) {
                Auth::login($user);
            }

            // Check if LVR already submitted
            if ($user->lvr_submitted) {
                return redirect()->route('dashboard')->with('success', 'Welcome back! Your subscription is active.');
            }

            // Redirect to LVR form - MANDATORY
            return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission to activate your account.');

        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error('Stripe session retrieval failed: ' . $e->getMessage());
            
            // Check if user is logged in and has subscription
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->subscribed('default')) {
                    if ($user->lvr_submitted) {
                        return redirect()->route('dashboard')->with('success', 'Welcome back!');
                    }
                    return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
                }
            }

            return redirect()->route('subscription.checkout')->with('error', 'Session expired. Please complete your subscription again.');
        } catch (\Exception $e) {
            \Log::error('Subscription success handler error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            // If user is logged in, continue anyway
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->subscribed('default')) {
                    if ($user->lvr_submitted) {
                        return redirect()->route('dashboard')->with('success', 'Welcome back!');
                    }
                    return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
                }
            }

            return redirect()->route('subscription.checkout')->with('error', 'An error occurred. Please try again or contact support.');
        }
    }

    /**
     * Show LVR submission form
     */
    public function showLvrForm()
    {
        $user = Auth::user();
        
        // Check if already submitted
        if ($user && $user->lvr_submitted) {
            return redirect()->route('dashboard')->with('info', 'You have already submitted your LVR.');
        }
        
        return view('subscription.lvr-form');
    }

    /**
     * Handle LVR submission
     */
    public function submitLvr(Request $request)
    {
        $request->validate([
            'number_of_properties' => 'required|integer|min:1',
            'total_mortgage' => 'required|numeric|min:0',
            'total_valuation' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        
        // Calculate LVR
        $lvr = 0;
        if ($request->total_valuation > 0) {
            $lvr = ($request->total_mortgage / $request->total_valuation) * 100;
        }

        // Update user with LVR data
        $user->update([
            'number_of_properties' => $request->number_of_properties,
            'total_mortgage' => $request->total_mortgage,
            'total_valuation' => $request->total_valuation,
            'lvr_percentage' => $lvr,
            'lvr_submitted' => true,
            'lvr_submitted_at' => now(),
        ]);

        // Keep user logged in and redirect to email verification page
        return redirect()->route('subscription.verify.email')->with('success', 'LVR submitted successfully!');
    }

    /**
     * Show email verification page
     */
    public function showVerifyEmail()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('home');
        }

        // If already verified (email_verified_at is set), go to dashboard
        if ($user->email_verified_at) {
            return redirect()->route('dashboard');
        }

        return view('subscription.verify-email');
    }

    /**
     * Send verification email
     */
    public function sendVerificationEmail(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('home');
        }

        // If already verified, go to dashboard
        if ($user->email_verified_at) {
            return redirect()->route('dashboard')->with('success', 'Your email is already verified!');
        }

        // Send verification email
        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'Verification email sent! Please check your inbox.');
    }

    /**
     * Handle email verification
     */
    public function verifyEmail(Request $request)
    {
        $user = \App\Models\User::findOrFail($request->route('id'));

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            return redirect()->route('home')->with('error', 'Invalid verification link.');
        }

        if ($user->email_verified_at) {
            return redirect()->route('dashboard')->with('info', 'Your email is already verified!');
        }

        // Mark email as verified
        $user->email_verified_at = now();
        $user->save();

        // Log the user in automatically
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Email verified successfully! Welcome to your dashboard.');
    }

    /**
     * Show final success page after LVR submission
     */
    public function successComplete()
    {
        return view('subscription.success');
    }

    /**
     * Resend password reset email (for guests after logout)
     */
    public function resendPasswordGuest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = \App\Models\User::where('email', $request->email)->first();
        
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Generate password reset token
        $token = \Illuminate\Support\Facades\Password::createToken($user);
        $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));

        // Send password reset email
        try {
            \Illuminate\Support\Facades\Mail::send('emails.welcome', [
                'user' => $user,
                'resetUrl' => $resetUrl
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Set Your Password - HELP Platform');
            });

            return redirect()->back()->with('success', 'Password reset email has been sent! Check your inbox.');
        } catch (\Exception $e) {
            \Log::error('Failed to send password reset email: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send email. Please try again or contact support.');
        }
    }

    /**
     * Handle Stripe webhooks
     */
    public function webhook(Request $request)
    {
        // Let Laravel Cashier handle most webhook events automatically
        // But we'll add custom logging for subscription events
        
        $payload = $request->getContent();
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch(\UnexpectedValueException $e) {
            \Log::error('Webhook error: Invalid payload');
            return response('Invalid payload', 400);
        }

        // Log the event
        \Log::info('Stripe webhook received: ' . $event->type);

        // Handle specific events
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                \Log::info('Checkout session completed: ' . $session->id);
                
                // Sync subscription data
                if ($session->subscription) {
                    try {
                        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
                        $stripeSubscription = \Stripe\Subscription::retrieve($session->subscription);
                        
                        $user = \App\Models\User::where('stripe_id', $session->customer)->first();
                        
                        if ($user) {
                            $existingSubscription = $user->subscriptions()
                                ->where('stripe_id', $stripeSubscription->id)
                                ->first();
                            
                            if (!$existingSubscription) {
                                $user->subscriptions()->create([
                                    'type' => 'default',
                                    'stripe_id' => $stripeSubscription->id,
                                    'stripe_status' => $stripeSubscription->status,
                                    'stripe_price' => $stripeSubscription->items->data[0]->price->id,
                                    'quantity' => 1,
                                    'trial_ends_at' => null,
                                    'ends_at' => null,
                                    'organization_id' => $user->organization_id,
                                    'branch_id' => $user->branch_id,
                                ]);
                                
                                \Log::info('Webhook: Created subscription for user ' . $user->email);
                            }
                        } else {
                            \Log::warning('Webhook: User not found for customer ' . $session->customer);
                        }
                    } catch (\Exception $e) {
                        \Log::error('Webhook: Error syncing subscription: ' . $e->getMessage());
                    }
                }
                break;
                
            case 'customer.subscription.created':
            case 'customer.subscription.updated':
                $subscription = $event->data->object;
                \Log::info('Subscription event: ' . $event->type . ' | ID: ' . $subscription->id);
                break;
                
            case 'customer.subscription.deleted':
                $subscription = $event->data->object;
                \Log::info('Subscription deleted: ' . $subscription->id);
                break;
        }

        return response('Webhook handled', 200);
    }
}
