<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Category;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\MarketingPoster;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use VisitLog;
use Illuminate\Http\Response as HttpResponse;

class HomeController extends Controller
{
    public function index()
    {
        VisitLog::save();

        return view('welcome', [
            'categories' => Category::all()->take(12),
            'businesses' => Business::all()->take(8),
            'products' => Product::available()->with(['media' => function($query) {
                $query->where('type', 'image')->inRandomOrder();
            }])->get()->take(10),
            'marketing_posters' => MarketingPoster::all()->take(5)
        ]);
    }

    public function notifications()
    {
        $notifications = auth()->user()->unreadNotifications()->get()->take(6);

        $notifications_count = auth()->user()->unreadNotifications()->count();

        if (auth()->user()->hasRole('vendor')) {
            $notifications_count += auth()->user()->business->unreadNotifications()->count();
        }

        if (auth()->user()->hasRole('vendor')) {
            auth()->user()->business->unreadNotifications()->get()->take(6)
                ->each(function ($notification) use  ($notifications) {
                    collect($notifications)->push($notification);
                });
        }

        if (request()->wantsJson()) {
            return response()->json(['notifications' => $notifications, 'notifications_count' => $notifications_count], 200);
        }
    }

    public function notification($notification)
    {
        $notification = DatabaseNotification::findOrFail($notification);

        $notification->markAsRead();

        $route = '';

        if ($notification->type == 'App\\Notifications\\QuotationAdded') {
            $order = Order::with('invoice')->find($notification->data['order_item']['order_id']);
            if ($order) {
                $route = route('orders.show', ['order' => $order]);
            }
        } else if ($notification->type == 'App\\Notifications\\FinancingRequestUpdated') {
            $invoice = Invoice::with('orders')->find($notification->data['invoice']['id']);
            $order = $invoice->orders->first();
            if ($order) {
                $route = route('orders.show', ['order' => $order]);
            }
        } else {
            $order = Order::with('invoice')->find($notification->data['order']['id']);
            if ($order) {
                $route = route('vendor.orders.show', ['order' => $order]);
            }
        }

        if(!$order) {
            if (request()->wantsJson()) {
                return response()->json(['message' => 'Order not found'], 404);
            }
            toastr()->error('', 'The order no longer exists');
            return redirect()->route('home');
        }

        if (request()->wantsJson()) {
            return response()->json(['route' => $route], 200);
        }

        return redirect()->$route;
    }

    public function notificationsReadAll()
    {
        if (auth()->guest()) {
            abort(HttpResponse::HTTP_FORBIDDEN);
        }

        auth()->user()->unreadNotifications->markAsRead();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Cleared all notifications'], 200);
        }
    }
}
