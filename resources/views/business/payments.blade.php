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
                <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md gap-2 mx-2 lg:w-[30%] hover:bg-orange-400 hidden">
                    <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-gray-600 text-xl bg-white rounded-full">
                        <i class="fas fa-arrow-up"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto my-auto">
                        <span class="font-semibold">Request Payment</span>
                    </div>
                </div>
                <button id="withdraw-amount-btn" data-modal-target="withdraw-amount-modal" data-modal-toggle="withdraw-amount-modal" class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md flex gap-2 mx-2 lg:w-[30%] hover:bg-primary-one active:bg-orange-400 cursor-pointer">
                    <span class="inline-flex items-center justify-center h-full px-4 py-2 ml-2 text-gray-600 text-xl bg-white rounded-full">
                        <i class="fas fa-arrow-down"></i>
                    </span>
                    <div class="ml-2 overflow-x-auto my-auto">
                        <span class="font-semibold">Withdraw</span>
                    </div>
                </button>
                <x-modal modal_id="withdraw-amount-modal">
                    <div class="relative w-full max-w-lg max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button id="close-withdraw-amount-modal" type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="withdraw-amount-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <h2 class="px-4 py-2 lg:px-4 font-bold text-xl">Amount</h2>
                            <div class="space-y-2 p-2">
                                <form action="{{ route('wallet.withdraw') }}" method="POST" id="withdraw-form">
                                    @csrf
                                    <div class="form-group mt-2">
                                        <x-input-label for="Enter Amount" :value="__('Enter Amount to Withdraw')" />
                                        <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" autocomplete="off" />
                                        <x-input-error :messages="$errors->get('amount')" class="mt-1" />
                                    </div>
                                    <div class="w-full flex mt-2">
                                        <button type="submit" id="withdraw-btn" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Withdraw</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </x-modal>
                <button type="button" class="hidden" id="confirm-withdraw-btn" data-modal-target="confirm-withdraw-modal" data-modal-toggle="confirm-withdraw-modal"></button>
                <x-modal modal_id="confirm-withdraw-modal">
                    <div class="relative w-full max-w-lg max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="confirm-withdraw-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <h2 class="px-4 py-2 lg:px-4 font-bold text-xl">Confirm Withdrawal</h2>
                            <div class="space-y-2 p-2">
                                <form action="{{ route('wallet.withdraw.authorize') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="ref" id="transaction_ref">

                                    <div class="form-group mt-2">
                                        <x-input-label for="Enter Code" :value="__('Enter Code to Confirm Withdrawal')" />
                                        <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" autocomplete="off" />
                                        <x-input-error :messages="$errors->get('otp')" class="mt-1" />
                                    </div>
                                    <div class="w-full flex mt-2">
                                        <button type="submit" class="bg-primary-one rounded-lg w-full p-2 text-white text-center font-semibold">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </x-modal>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('#withdraw-btn').on('click', function(e) {
        e.preventDefault();
        let amount = $('#amount').val()
        if (amount <= 0) {
            $('#amount').addClass('border-red-400')

            return
        }

        $('#withdraw-btn').attr('disabled', 'disabled');
        $('#withdraw-btn').addClass('bg-orange-400');
        $('#withdraw-btn').removeClass('bg-primary-one');
        $('#withdraw-btn').html('Processing...');
        let formData = $('#withdraw-form').serializeArray()
        $.ajax({
            method: "POST",
            dataType: 'json',
            headers: {
                Accept: 'application/json'
            },
            url: "{{ route('wallet.withdraw') }}",
            data: formData,
            success: (response) => {
                $('#transaction_ref').val(response.ref)
                $('#close-withdraw-amount-modal').click()
                $('#confirm-withdraw-btn').click()
                $('#withdraw-btn').removeAttr('disabled');
                $('#withdraw-btn').removeClass('bg-orange-400');
                $('#withdraw-btn').addClass('bg-primary-one');
                $('#withdraw-btn').html('Withdraw');
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass" : "toast-top-right"
                }
                toastr.success("Please enter confirmation code.");
            },
            error: (response) => {
                $('#withdraw-btn').removeAttr('disabled');
                $('#withdraw-btn').removeClass('bg-orange-400');
                $('#withdraw-btn').addClass('bg-primary-one');
                $('#withdraw-btn').html('Withdraw');
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass" : "toast-top-right"
                }
                toastr.error("An error occurred. Please try again.");
            }
        })
    })
    </script>
</x-app-layout>
