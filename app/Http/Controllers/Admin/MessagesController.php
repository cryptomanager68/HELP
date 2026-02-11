<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display all customer messages
     */
    public function index()
    {
        $messages = Messages::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $pendingCount = Messages::where('status', 'pending')->count();
        $respondedCount = Messages::where('status', 'responded')->count();

        return view('admin.messages', compact('messages', 'pendingCount', 'respondedCount'));
    }

    /**
     * Mark message as responded
     */
    public function markResponded(Messages $message)
    {
        $message->update(['status' => 'responded']);

        return back()->with('success', 'Message marked as responded');
    }
}
