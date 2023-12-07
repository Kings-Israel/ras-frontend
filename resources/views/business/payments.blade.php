<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Payments" sub-title="All Payments are seen here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <h3 class="text-xl font-bold my-2 mt-4">Earnings</h3>
            <div class="lg:flex gap-3 space-y-2 lg:space-y-0">
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 lg:w-[30%]">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-green-600 text-xl bg-white rounded-full">
                        <i class="fas fa-money-bill-alt"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto">
                        <span class="text-sm">Wallet Balance</span>
                        <h1 class="text-xl font-bold">USD.{{ number_format($wallet_balance) }}</h1>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 lg:w-[30%] hover:bg-orange-400">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-gray-600 text-xl bg-white rounded-full">
                        <i class="fas fa-arrow-up"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto my-auto">
                        <span class="text-sm">Request Payment</span>
                    </div>
                </div>
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 lg:w-[30%] hover:bg-orange-400">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-gray-600 text-xl bg-white rounded-full">
                        <i class="fas fa-arrow-down"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto my-auto">
                        <span class="text-sm">Withdraw</span>
                    </div>
                </div>
            </div>
            {{-- <h3 class="text-xl font-bold my-2 mt-4">Currency Converter</h3>
            <div class="border border-gray-400 rounded-md p-2 lg:w-[50%]">
                <div class="flex gap-2 w-full mb-2">
                    <select name="" id="" class="text-gray-500 rounded-md w-[55%]">
                        <option value="">Select Currenct</option>
                        <option value="">Kenya Shilling (Ksh)</option>
                    </select>
                    <div class="w-[10%]"></div>
                    <select name="" id="" class="text-gray-500 rounded-md w-[55%]">
                        <option value="">Select Currency</option>
                        <option value="">US Dollar (US$)</option>
                    </select>
                </div>
                <div class="lg:flex gap-3">
                    <x-text-input type="number" class="focus:ring-0 w-full"></x-text-input>
                    <div class="hidden lg:flex flex-col my-auto w-[20%]">
                        <i class="fas fa-arrow-left text-green-500 text-center"></i>
                        <i class="fas fa-arrow-right text-green-500 text-center"></i>
                    </div>
                    <div class="flex justify-center lg:hidden w-full lg:w-0 my-2 lg:my-0">
                        <i class="fas fa-arrow-up text-green-500"></i>
                        <i class="fas fa-arrow-down text-green-500"></i>
                    </div>
                    <x-text-input type="number" class="focus:ring-0 w-full"></x-text-input>
                </div>
            </div> --}}
            <h3 class="text-xl font-bold my-2 mt-4">Transactions</h3>
            {{-- <div class="flex gap-6">
                <span class="font-extrabold text-primary-one underline underline-offset-2 decoration-4">All Transaction</span>
                <span class="font-extrabold text-gray-400">Complete</span>
                <span class="font-extrabold text-gray-400">Failed</span>
                <span class="font-extrabold text-gray-400">In Progress</span>
            </div> --}}
            <livewire:vendor.payments-list />
        </div>
        <x-right-side-bar />
    </div>
</x-app-layout>
