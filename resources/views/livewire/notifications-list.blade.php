<div class="">
    <div class="text-gray-800 bg-gray-300 rounded-full w-7 h-7 my-auto lg:my-0 md:w-8 md:h-8 text-center pt-0.5 md:pt-1">
        @if ($notificationCount > 0)
            <span class="w-5 h-5 font-bold hover:cursor-pointer" id="dropdown-button" data-dropdown-toggle="notifications-dropdown" data-dropdown-placement="bottom">{{ $notificationCount }}</span>
        @else
            <i class="w-5 h-5 fas fa-bell"></i>
        @endif
    </div>
    @if ($notificationCount > 0)
        <div id="notifications-dropdown" class="z-40 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-80 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 space-y-2" aria-labelledby="dropdown-button">
                @foreach ($notifications as $notification)
                    @if ($notification->type == 'App\\Notifications\\NewOrder')
                        <li class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300" wire:click="goToOrders({{ $notification }})">
                            <span class="font-semibold">You have a new order <strong>{{ $notification['data']['order']['order_id'] }}</strong></span>
                        </li>
                    @endif
                    @if ($notification->type == 'App\\Notifications\\UpdatedOrder')
                        <li class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300" wire:click="goToOrders({{ $notification }})">
                            <span class="font-semibold">Your order, <strong>{{ $notification['data']['order']['order_id'] }}</strong>, was updated</span>
                        </li>
                    @endif
                    @if ($notification->type == 'App\\Notifications\\QuotationAdded')
                        <li class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300" wire:click="goToOrders({{ $notification }})">
                            <span class="font-semibold">New Quotation added for the order <strong>{{ $notification['data']['order_item']['order']['order_id'] }}</strong></span>
                        </li>
                    @endif
                    @if ($notification->type == 'App\\Notifications\\FinancingRequestUpdated')
                        <li class="hover:bg-gray-100 hover:cursor-pointer text-left p-2 border-b border-gray-300" wire:click="goToOrders({{ $notification }})">
                            <span class="font-semibold">Financing Request Updated for the order <strong>{{ $notification['data']['invoice']['invoice_id'] }}</strong></span>
                        </li>
                    @endif
                @endforeach
            </ul>
            <button class="bg-primary-one px-2 py-1 text-center text-white mt-2 rounded mx-2 mb-2 w-[94%]" wire:click="markAllAsRead">Mark All as Read</button>
        </div>
    @endif
</div>
