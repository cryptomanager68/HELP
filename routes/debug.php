<?php

use Illuminate\Support\Facades\Route;

Route::get('/debug-auth', function () {
    $user = auth()->user();
    
    if (!$user) {
        return response()->json([
            'authenticated' => false,
            'message' => 'Not logged in'
        ]);
    }
    
    return response()->json([
        'authenticated' => true,
        'user_id' => $user->id,
        'email' => $user->email,
        'roles' => $user->getRoleNames(),
        'has_super_admin' => $user->hasRole('super_admin'),
    ]);
});
