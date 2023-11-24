<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Messages" sub-title="All Customer Messages Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x md:h-[43rem] 4xl:h-[61rem]" id="app">
        <div class="md:col-span-3 lg:mx-3 sm:ml-3 mt-2 border-2 border-gray-300 rounded-lg">
            <chat-component email="{{ auth()->user()->email }}"></chat-component>
        </div>
        <x-right-side-bar />
    </div>
</x-main>
