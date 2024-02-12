<x-main class="bg-gray-500">
    <div class="lg:mx-60 lg:my-10 mt-2 border-2 border-gray-300 rounded-lg bg-white" id="app">
        <chat-component email="{!! auth()->user()->email !!}" user="{!! $user_id !!}"></chat-component>
    </div>
</x-main>
