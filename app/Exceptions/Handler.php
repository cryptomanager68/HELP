<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    { 
        // Handle CSRF token mismatch (419 errors) more gracefully
        $this->renderable(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            // If it's a subscription checkout request, redirect back to checkout with fresh token
            if ($request->is('subscription/*') || $request->routeIs('subscription.*')) {
                return redirect()->route('subscription.checkout')
                    ->with('info', 'Your session expired. Please try again.');
            }
            
            // If it's a logout request, just redirect to home without error
            if ($request->is('admin/logout') || 
                $request->is('admin/auth/logout') || 
                $request->routeIs('logout') ||
                $request->routeIs('filament.admin.auth.logout')) {
                return redirect('/');
            }
            
            // For other requests, redirect to home
            return redirect('/')
                ->with('info', 'Your session has expired. Please try again.');
        });
        
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
