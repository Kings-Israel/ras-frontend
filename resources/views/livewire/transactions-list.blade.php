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
</script>
