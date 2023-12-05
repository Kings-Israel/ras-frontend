<?php

namespace App\Livewire;

use App\Models\Invoice;
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

        $notification->markAsRead();

        if ($notification->type == 'App\\Notifications\\QuotationAdded') {
            $order = Order::with('invoice')->find($notification->data['order_item']['order_id']);
        } else if ($notification->type == 'App\\Notifications\\FinancingRequestUpdated') {
            $invoice = Invoice::with('orders')->find($notification->data['invoice']['id']);
            $order = $invoice->orders->first();
        } else {
            $order = Order::with('invoice')->find($notification->data['order']['id']);
        }

        if(!$order) {
            toastr()->error('', 'The order no longer exists');
            return redirect()->route('home');
        }

        if (auth()->user()->hasRole('vendor')) {
            return redirect()->route('vendor.orders');
        } else {
            return redirect()->route('orders.show', ['order' => $order]);
        }
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
        $this->notifications = auth()->user()->unreadNotifications()->get()->take(6);

        if (auth()->user()->hasRole('vendor')) {
            auth()->user()->business->unreadNotifications()->get()->take(6)->each(function ($notification) {
                $this->notifications->push($notification);
            });
        }
    }

    public function render()
    {
        return view('livewire.notifications-list');
    }
}
