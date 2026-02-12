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
    public function showCheckout()
    {
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
            return view('subscription.checkout');
        }

        // Guest user - show checkout form
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

            // Generate a random password
            $password = \Illuminate\Support\Str::random(16);
            
            $user = \App\Models\User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->name, 
                    'password' => bcrypt($password),
                    'email_verified_at' => now(), // Auto-verify email
                ]
            );
            
            // Log the user in immediately
            Auth::login($user);
        }

        return $user->newSubscription('default', config('services.stripe.price_id'))
            ->checkout([
                'success_url' => route('subscription.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('home'),
                'customer_update' => [
                    'address' => 'auto',
                ],
                'billing_address_collection' => 'auto',
                'phone_number_collection' => [
                    'enabled' => false,
                ],
                'allow_promotion_codes' => false,
                'consent_collection' => [
                    'terms_of_service' => 'none',
                ],
            ]);
    }

    /**
     * Handle successful subscription
     */
    public function success(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // Try to get session_id from Stripe and authenticate user
            $sessionId = $request->get('session_id');
            
            if ($sessionId) {
                try {
                    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
                    $session = \Stripe\Checkout\Session::retrieve($sessionId);
                    
                    // Find user by customer ID
                    $user = \App\Models\User::where('stripe_id', $session->customer)->first();
                    
                    if ($user) {
                        Auth::login($user);
                    }
                } catch (\Exception $e) {
                    \Log::error('Stripe session retrieval failed: ' . $e->getMessage());
                }
            }
        }
        
        $user = Auth::user();
        
        if ($user) {
            // Check if LVR already submitted
            if ($user->lvr_submitted) {
                // Already submitted, go to dashboard
                return redirect()->route('dashboard')->with('success', 'Welcome back! Your subscription is active.');
            }
            
            // Redirect to LVR form - MANDATORY
            return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission to activate your account.');
        }
        
        return view('subscription.success');
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

        // Generate password reset token
        $token = \Illuminate\Support\Facades\Password::createToken($user);
        $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));

        // Send welcome email with password reset link
        try {
            \Illuminate\Support\Facades\Mail::send('emails.welcome', [
                'user' => $user,
                'resetUrl' => $resetUrl
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Welcome to HELP - Set Your Password');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send welcome email: ' . $e->getMessage());
        }

        return redirect()->route('subscription.success.complete')->with('success', 'LVR submitted successfully! Check your email to set your password.');
    }

    /**
     * Show final success page after LVR submission
     */
    public function successComplete()
    {
        return view('subscription.success');
    }

    /**
     * Handle Stripe webhooks
     */
    public function webhook(Request $request)
    {
        // Handled by Cashier automatically
    }
}
