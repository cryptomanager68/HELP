<?php

namespace App\Notifications;

use App\Models\Messages;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     */
    public function __construct(Messages $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Customer Message: ' . $this->message->subject)
            ->greeting('New Message from ' . $this->message->user->name)
            ->line('**Subject:** ' . $this->message->subject)
            ->line('**From:** ' . $this->message->user->name . ' (' . $this->message->user->email . ')')
            ->line('**Message:**')
            ->line($this->message->message)
            ->action('View All Messages', url('/admin/messages'))
            ->line('Reply to customer: ' . $this->message->user->email);
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message_id' => $this->message->id,
            'subject' => $this->message->subject,
            'user_name' => $this->message->user->name,
            'user_email' => $this->message->user->email,
        ];
    }
}
