<div class="min-h-screen">
    <span class="lg:flex lg:px-28 mt-2 gap-2 text-sm">
        <a href="{{ route('welcome') }}" class="text-gray-500">Home ></a>
        <a href="#" class="">Transactions</a>
    </span>
    <form action="#" method="post" class="block lg:flex px-4 lg:px-28 p-4 gap-12">
        @csrf
        <div class="basis-3/4 bg-gray-50 p-2 rounded-lg">
            <h3 class="text-3xl text-gray-600 font-bold">Transactions</h3>
            <div class="space-y-2">
                <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
                    <thead class="text-xs text-gray-900 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
                        <tr>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Transaction Ref
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Date
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                                <th scope="row" class="px-2 py-2 font-extrabold text-gray-700 whitespace-nowrap dark:text-white hover:text-gray-800">
                                    {{ $transaction->transaction_ref }}
                                </th>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ $transaction->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-2 py-2 text-gray-600">
                                    {{ $transaction->amount }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $transactions->links('vendor.livewire.tailwind') }}
                </div>
            </div>
        </div>
        <div class="basis-1/4 space-y-2">
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Total Transaction Amount:</h4>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800">{{ number_format($total_amount) }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <div class="flex justify-between">
                        <h4 class="text-sm font-semibold text-gray-500">Wallet Balance:</h4>
                        <span class="text-sm text-end font-bold hover:cursor-pointer" id="update-wallet-btn">Update</span>
                    </div>
                    <div class="flex gap-1">
                        <h3 class="font-bold text-xl text-gray-600 my-auto"></h3>
                        <span class="font-bold text-xl text-gray-800" id="wallet-balance">{{ number_format($wallet_balance) }}</span>
                    </div>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Top Up Wallet:</h4>
                    <form action="{{ route('wallet.top-up') }}" method="post" class="space-y-2">
                        <x-input-label :value="__('Amount')" />
                        <x-text-input name="amount" class="w-full my-1" required></x-text-input>
                        <x-primary-button class="w-full py-1">Top Up</x-primary-button>
                    </form>
                </div>
            </div>
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-semibold text-gray-500">Withdraw:</h4>
                    <form action="{{ route('wallet.withdraw') }}" method="post" class="space-y-2" id="withdraw-form">
                        @csrf
                        <x-input-label :value="__('Amount')" />
                        <x-text-input name="amount" class="w-full my-1" type="number" id="amount" required></x-text-input>
                        <x-primary-button class="w-full py-1" id="withdraw-btn">Withdraw</x-primary-button>
                    </form>
                </div>
            </div>
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
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#update-wallet-btn').on('click', function() {
        $('#update-wallet-btn').html('Updating...');
        $.ajax({
            method: "GET",
            dataType: 'json',
            headers: {
                Accept: 'application/json'
            },
            url: "{{ route('wallet.balance') }}",
            success: (response) => {
                $('#update-wallet-btn').html('Update');
                $('#wallet-balance').html(new Intl.NumberFormat().format(Number(response.balance)))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass" : "toast-top-right"
                }
                toastr.success("Wallet Balance Updated");
            },
            error: (response) => {
                $('#update-wallet-btn').html('Update');
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
                $('#confirm-withdraw-btn').click()
                $('#withdraw-btn').removeAttr('disabled');
                $('#withdraw-btn').removeClass('bg-orange-400');
                $('#withdraw-btn').addClass('bg-primary-one');
                $('#withdraw-btn').html('Withdraw');
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
