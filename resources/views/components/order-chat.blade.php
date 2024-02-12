@props(['id' => 'app-orders', 'order'])
<div id="{{ $id }}" class="mt-2">
    <h3 class="text-lg text-black p-2 font-bold">Order Messages</h3>
    <div class="bg-gray-50 border-2 border-gray-300 rounded-lg">
        <order-chat-component email="{!! auth()->user()->email !!}" order="{!! $order !!}"></order-chat-component>
    </div>
</div>
