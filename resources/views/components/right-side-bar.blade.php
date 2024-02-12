<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="px-2">
    <div class="flex justify-between">
        <h2 class="font-bold text-lg my-auto">Statistics</h2>
        <form action="#" method="POST" class="flex">
            <label for="" class="text-gray-400 font-bold my-auto">Last:</label>
            <div class="relative">
                <i class="fas fa-calendar absolute inset-y-0 left-0 flex items-center pl-1 pointer-events-none text-sm text-bold"></i>
                <select name="reports-date-select" id="" class="border-none focus:ring-0 text-sm text-bold pl-7">
                    <option value="#">30 Days</option>
                    <option value="#">60 Days</option>
                </select>
            </div>
        </form>
    </div>
    <div class="mt-10 space-y-4">
        <div class="bg-lime-100 dark:bg-lime-100 p-3 rounded-md flex gap-2 mx-2">
            <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-yellow-500 text-md bg-white rounded-full">
                <i class="fas fa-shopping-bag"></i>
            </span>
            <div class="ml-2 overflow-x-auto">
                <span class="text-sm">Orders</span>
                <h1 class="text-md font-bold">{{ $orders_count }}</h1>
            </div>
        </div>
        <div class="bg-rose-200 dark:bg-pink-100 p-3 rounded-md flex gap-2 mx-2">
            <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-pink-600 text-md bg-white rounded-full">
                <i class="fas fa-wallet"></i>
            </span>
            <div class="ml-2 overflow-x-auto">
                <span class="text-sm">Revenue</span>
                <h1 class="text-md font-bold">USD.{{ number_format($revenue) }}</h1>
            </div>
        </div>
        <div class="bg-gray-200 dark:bg-gray-200 p-3 rounded-md">
            <div class="flex gap-2 mx-2">
                <span class="inline-flex items-center justify-center px-4 py-2 ml-2 text-green-600 text-md bg-white rounded-full">
                    <i class="fas fa-money-bill-alt"></i>
                </span>
                <div class="ml-2 overflow-x-auto w-full">
                    <div class="flex justify-between">
                        <span class="text-sm">Wallet Balance</span>
                        <span class="text-sm text-end font-bold hover:cursor-pointer" id="update-wallet-btn">Update</span>
                    </div>
                    <h1 class="text-md font-bold">USD. <span id="wallet-balance">{{ number_format($wallet_balance) }}</span></h1>
                </div>
            </div>
        </div>
    </div>
    @if (count($top_countries) > 0)
        <div class="mt-10">
            <h2 class="font-bold text-sm">Top Countries</h2>
            <ul class="grid grid-cols-2 list-disc">
                @foreach ($top_countries as $country => $quantity)
                    <li class="flex gap-2">
                        @if ($quantity['country_details'])
                            <img src="https://flagcdn.com/w20/{!! Str::lower($quantity['country_details']->iso) !!}.png" srcset="https://flagcdn.com/w20/{!! Str::lower($quantity['country_details']->iso) !!}.png" alt="" class="w-4 h-4 rounded-full object-cover">
                        @else
                            <i class="fas fa-circle mt-1 text-secondary-six text-xs"></i>
                        @endif
                        <div class="flex flex-col">
                            <span class="text-sm font-semibold text-gray-500">
                                {{ $country }}
                            </span>
                            <span class="font-bold">{{ $quantity['percentage'] }}%</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<script src="{{ asset('assets/js/jquery-1.12.4.js') }}"></script>
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
