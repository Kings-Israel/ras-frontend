<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Orders" sub-title="All Customer Orders Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <h3 class="text-xl font-bold my-2 mt-8">Quotation Requests</h3>
            <div>
                <livewire:vendor.quotation-requests />
            </div>
        </div>

        <x-right-side-bar />
    </div>
</x-app-layout>
