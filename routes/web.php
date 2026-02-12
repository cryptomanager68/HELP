<?php
use App\Http\Controllers\{EOIController, PayslipController, SubscriptionController, MemberContactController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main Homepage (Integrated subscription + original content)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Gateway Routes
Route::get('/equity-participant-gateway', [EOIController::class, 'equityParticipantGateway'])->name('equity-participant-gateway');
Route::get('/property-owner-gateway', [EOIController::class, 'propertyOwnerGateway'])->name('property-owner-gateway');
Route::post('/eoi/submit', [EOIController::class, 'submit'])->name('eoi.submit');

// Subscription Routes
Route::get('/subscription/required', [SubscriptionController::class, 'required'])->name('subscription.required');
Route::get('/subscription/checkout', [SubscriptionController::class, 'showCheckout'])->name('subscription.checkout');
Route::post('/subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout.process');
Route::get('/subscription/success', [SubscriptionController::class, 'success'])->name('subscription.success');

// LVR Submission Routes (after payment)
Route::middleware(['auth'])->group(function () {
    Route::get('/subscription/lvr-form', [SubscriptionController::class, 'showLvrForm'])->name('subscription.lvr.form');
    Route::post('/subscription/lvr-submit', [SubscriptionController::class, 'submitLvr'])->name('subscription.lvr.submit');
    Route::get('/subscription/complete', [SubscriptionController::class, 'successComplete'])->name('subscription.success.complete');
});

// Stripe Webhook
Route::post('/stripe/webhook', [SubscriptionController::class, 'webhook'])->name('cashier.webhook');

// Admin Routes (for viewing customer messages)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/messages', [\App\Http\Controllers\Admin\MessagesController::class, 'index'])->name('messages.index');
    Route::patch('/messages/{message}/respond', [\App\Http\Controllers\Admin\MessagesController::class, 'markResponded'])->name('messages.mark-responded');
});

// Authenticated Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard - Check subscription and show appropriate view
    Route::get('/dashboard', function () {
        $user = auth()->user();
        
        // Refresh subscription status from database to catch recent payments
        $user->refresh();
        
        // If user has active subscription, check LVR submission
        if ($user->subscribed('default')) {
            // Check if LVR has been submitted
            if (!$user->lvr_submitted) {
                return redirect()->route('subscription.lvr.form')->with('warning', 'Please complete your LVR submission to access the dashboard.');
            }
            
            // Clear recent payment flag if exists
            session()->forget(['recent_payment', 'payment_time']);
            return view('member-dashboard');
        }
        
        // Check for recent payment (within last 10 minutes) - allow access for testing
        if (session('recent_payment') && session('payment_time')) {
            $paymentTime = session('payment_time');
            if (now()->diffInMinutes($paymentTime) < 10) {
                // In test mode, check LVR submission
                if (!$user->lvr_submitted) {
                    return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
                }
                return view('member-dashboard')->with('info', 'Test mode: Your subscription is being processed.');
            }
        }
        
        // Check if user has a stripe_id (payment was initiated) - allow for testing
        if ($user->stripe_id && !$user->subscribed('default')) {
            // Payment may be processing - check LVR
            if (!$user->lvr_submitted) {
                return redirect()->route('subscription.lvr.form')->with('info', 'Please complete your LVR submission.');
            }
            return view('member-dashboard')->with('info', 'Test mode: Your payment is being processed.');
        }
        
        // If no subscription, redirect to checkout
        return redirect()->route('subscription.checkout');
    })->name('dashboard');
    
    // Member Contact (requires subscription)
    Route::post('/member/contact', [MemberContactController::class, 'submit'])->name('member.contact.submit');
    
    // Payslip Download
    Route::get('/payslip/{payslip}/download', [PayslipController::class, 'download'])->name('payslip.download');
});

