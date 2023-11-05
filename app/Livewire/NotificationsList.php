<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsList extends Component
{
    public $notifications;
    public $notificationCount = 0;

    public function mount()
    {
        $this->notifications = collect([]);
        $this->getNotificationCount();
        $this->getNotifications();
    }

    public function markAsRead($notification)
    {
        if (auth()->guest()) {
            abort(HttpResponse::HTTP_FORBIDDEN);
        }

        $notification = DatabaseNotification::findOrFail($notification);
        $notification->markAsRead();
    }

    public function goToOrders($notification)
    {
        $notification = DatabaseNotification::findOrFail($notification['id']);

        $order = Order::find($notification->data['order']['id']);

        if(! $order) {
            toastr()->error('', 'The order no longer exists');

            return redirect()->route('home');
        }

        $notification->markAsRead();

        return redirect()->route('vendor.orders');

    }

    public function markAllAsRead()
    {
        if (auth()->guest()) {
            abort(HttpResponse::HTTP_FORBIDDEN);
        }

        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotificationCount();
        $this->getNotifications();
    }

    public function getNotificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if (auth()->user()->hasRole('vendor')) {
            $this->notificationCount += auth()->user()->business->unreadNotifications()->count();
        }
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()->unreadNotifications()->get()->take(4);

        if (auth()->user()->hasRole('vendor')) {
            auth()->user()->business->unreadNotifications()->get()->take(4)->each(function ($notification) {
                $this->notifications->push($notification);
            });
        }

        // $this->notifications = auth()->user()->business->unreadNotifications()->get()->take(4);

        // dd(auth()->user()->business->unreadNotifications()->get()->take(4));
    }

    public function render()
    {
        return view('livewire.notifications-list');
    }
}
