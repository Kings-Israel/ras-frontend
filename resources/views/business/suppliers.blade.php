<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Suppliers" sub-title="All Suppliers Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <livewire:vendor.suppliers-list />
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')

    @endpush
</x-app-layout>
