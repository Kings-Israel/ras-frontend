<div class="">
    <div class="md:flex md:justify-between space-y-2 my-2">
        <div class="flex gap-6">
            <x-primary-outline-button class="border-primary-one text-primary-one px-6">Bulk Actions <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
            <x-primary-outline-button class="border-primary-one text-primary-one px-6">Filter <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
        </div>
        {{ $products->links('vendor.livewire.tailwind') }}
    </div>
    <table class="w-full table-auto text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
        <thead class="text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
            <tr>
                <th scope="col" class="p-2">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-primary-one bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-primary-two dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-2 py-3">
                    Product Name
                </th>
                <th scope="col" class="px-2 py-3">
                    Brand
                </th>
                <th scope="col" class="px-2 py-3">
                    Category
                </th>
                <th scope="col" class="px-2 py-3">
                    Status
                </th>
                <th scope="col" class="px-2 py-3">
                    Price
                </th>
                <th scope="col" class="px-2 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                    <td class="w-4 p-2">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-primary-one bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-primary-two dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product->name }}
                    </th>
                    <td class="px-2 py-2">
                        {{ $product->brand }}
                    </td>
                    <td class="px-2 py-2">
                        {{ $product->category->name }}
                    </td>
                    <td class="px-2 py-2">
                        {{ $product->is_available ? 'In stock' : 'Out of stock' }}
                    </td>
                    <td class="px-2 py-2">
                        @if($product->price) USD.{{ number_format($product->price) }} @else USD.{{ number_format($product->min_price) }} - USD.{{ number_format($product->max_price) }} @endif
                    </td>
                    <td class="px-2 py-2 flex gap-3">
                        <a href="{{ route('vendor.products.edit', ['product' => $product]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{ $products->links('vendor.livewire.tailwind') }}
    </div>
</div>
