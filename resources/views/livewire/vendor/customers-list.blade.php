<div class="">
    <div class="md:flex md:justify-between space-y-2 my-2">
        <div class="flex gap-6">
            <x-primary-outline-button class="text-sm border-primary-one text-primary-one px-6 h-8">Bulk Actions <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
            <x-primary-outline-button class="text-sm border-primary-one text-primary-one px-6 h-8">Filter <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
        </div>
        <div class="flex gap-2">
            {{-- <a href="#" class="border-2 border-primary-one rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-left text-sm"></i></a>
            <span class="my-auto text-center">1/1</span>
            <a href="#" class="border-2 border-primary-one rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-right text-sm"></i></a> --}}
            {{ $users->links() }}
        </div>
    </div>
    <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
        <thead class="text-sm text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
            <tr>
                <th scope="col" class="p-2">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-2 py-3">
                    Customer Name
                </th>
                <th scope="col" class="px-2 py-3">
                    Last Order Value
                </th>
                <th scope="col" class="px-2 py-3">
                    Last Order Id
                </th>
                <th scope="col" class="px-2 py-3">
                    Last Delivered To
                </th>
                <th scope="col" class="px-2 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                    <td class="w-4 p-2">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </th>
                    <td class="px-2 py-2">
                        {{ count($user->orders > 0) ? $user->orders->last()->getTotalAmount(false) : 'No Complete Orders' }}
                    </td>
                    <td class="px-2 py-2">
                        {{ $user->orders->last()->order_id }}
                    </td>
                    <td class="px-2 py-2 truncate">
                        {{ $user->orders->last()->invoice->delivery_location_address }}
                    </td>
                    <td class="px-2 py-2 text-center">
                        <i id="dropdown-button" data-dropdown-toggle="customer-dropdown" class="fas fa-ellipsis-v"></i>
                        <div id="customer-dropdown" class="z-40 hidden bg-gray-200 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <a href="{{ route('messages', ['user' => $user]) }}" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Message</a>
                                </li>
                                <li>
                                    <a href="#" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex gap-2">
        {{ $users->links() }}
        {{-- <a href="#" class="border-2 border-primary-one rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-left text-sm"></i></a>
        <span class="my-auto text-center">1/1</span>
        <a href="#" class="border-2 border-primary-one rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-right text-sm"></i></a> --}}
    </div>
</div>
