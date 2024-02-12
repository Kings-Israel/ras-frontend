@props(['show_search' => true])
<div class="ml-5 md:ml-72 lg:flex md:mt-1 md:-mb-2">
    <div class="pr-20 lg:1/5 w-full">
        <h1 class="font-bold text-xl">{{ $mainTitle }}</h1>
        <h3>{{ $subTitle }}</h3>
    </div>
    @if ($show_search)
        <livewire:vendor.dashboard-search :business="auth()->user()->business" />
    @endif
</div>
