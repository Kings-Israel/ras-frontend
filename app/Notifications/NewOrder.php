<?php

namespace App\Notifications;

use App\Models\Business;
use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Order $order)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if ($notifiable instanceof User) {
            return (new MailMessage)
                        ->line('Hello, '.$notifiable->first_name)
                        ->line('You have received a new order, ORDER ID: '.$this->order->order_id)
                        ->action('Login to View Orders', url('/vendor/orders'))
                        ->line('Thank you for using our application!');
        }

        if ($notifiable instanceof Business) {
            if ($notifiable->contact_email) {
                return (new MailMessage)
                                ->line('Hello, '.$notifiable->user->first_name)
                                ->line('You have received a new order, ORDER ID: '.$this->order->order_id)
                                ->action('Login to View Orders', url('/vendor/orders'))
                                ->line('Thank you for using our application!');
            }
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        if ($notifiable instanceof Business) {
            return [
                'order' => $this->order
            ];
        }
    }
}
