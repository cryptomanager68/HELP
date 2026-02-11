<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MemberContactController extends Controller
{
    /**
     * Submit contact form (members only)
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Store message
        $message = Messages::create([
            'user_id' => Auth::id(),
            'organization_id' => Auth::user()->organization_id,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        // Send email notification to admin/team
        // You can specify team email addresses here
        $teamEmails = [
            env('ADMIN_EMAIL', 'admin@example.com'), // Set ADMIN_EMAIL in .env
        ];

        foreach ($teamEmails as $email) {
            try {
                Notification::route('mail', $email)
                    ->notify(new NewMessageNotification($message));
            } catch (\Exception $e) {
                // Log error but don't fail the request
                \Log::error('Failed to send message notification: ' . $e->getMessage());
            }
        }

        return back()->with('success', 'Your message has been sent to the strategy team. We will respond shortly.');
    }
}
