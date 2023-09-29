<div class="">
    <div class="md:flex md:justify-between space-y-2 my-2">
        <div class="flex gap-6">
            <x-primary-outline-button class="text-sm border-primary-one text-primary-one px-6 h-8">Bulk Actions <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
            <x-primary-outline-button class="text-sm border-primary-one text-primary-one px-6 h-8">Filter <i class="fas fa-chevron-down ml-3"></i></x-primary-outline-button>
        </div>
        {{-- <div class="flex gap-2">
            <a href="#" class="border-2 border-primary-one rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-left text-sm"></i></a>
            <span class="my-auto text-center">1/1</span>
            <a href="#" class="border-2 border-primary-one rounded-md my-auto text-center px-2 h-7 hover:bg-orange-400"><i class="fas fa-chevron-right text-sm"></i></a>
        </div> --}}
        {{ $products->links('vendor.livewire.tailwind') }}
    </div>
    <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate rounded-tl-lg rounded-tr-lg">
        <thead class="text-sm text-gray-500 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 border-2">
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
                        <i class="fas fa-trash"></i>
                        <i class="fas fa-edit"></i>
                    </td>
                </tr>
            @endforeach
            {{-- <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Gold Chains
                </th>
                <td class="px-2 py-2">
                    Afro Beats
                </td>
                <td class="px-2 py-2">
                    Ornaments
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.1,237,948
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Gold Dust
                </th>
                <td class="px-2 py-2">
                    Afro Beats
                </td>
                <td class="px-2 py-2">
                    Ornaments
                </td>
                <td class="px-2 py-2">
                    Out of stock
                </td>
                <td class="px-2 py-2">
                    Ksh.477,943
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Gold Cube
                </th>
                <td class="px-2 py-2">
                    Dangote
                </td>
                <td class="px-2 py-2">
                    Energy
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.3,334,542
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Green Bananas
                </th>
                <td class="px-2 py-2">
                    Simba
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.3,237,948
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Plastic Cups
                </th>
                <td class="px-2 py-2">
                    Dangote
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.493,498
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    West African Porcelain
                </th>
                <td class="px-2 py-2">
                    Afro Beats
                </td>
                <td class="px-2 py-2">
                    Ornaments
                </td>
                <td class="px-2 py-2">
                    Out of stock
                </td>
                <td class="px-2 py-2">
                    Ksh.249,848
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Tobacco
                </th>
                <td class="px-2 py-2">
                    Simba
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.2,237,543
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Bronze Wire
                </th>
                <td class="px-2 py-2">
                    Dangote
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.337,948
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Coltan
                </th>
                <td class="px-2 py-2">
                    Dangote
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    Out of stock
                </td>
                <td class="px-2 py-2">
                    Ksh.3,237,948
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Cement Bags
                </th>
                <td class="px-2 py-2">
                    Simba
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.5,493,847
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr>
            <tr class="bg-gray-50 border-2 rounded-bl-xl rounded-br-xl dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                <td class="w-4 p-2">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-orange-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-one dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Asbestos
                </th>
                <td class="px-2 py-2">
                    Dangote
                </td>
                <td class="px-2 py-2">
                    Building Material
                </td>
                <td class="px-2 py-2">
                    In stock
                </td>
                <td class="px-2 py-2">
                    Ksh.3,237,948
                </td>
                <td class="px-2 py-2 flex gap-3">
                    <i class="fas fa-trash"></i>
                    <i class="fas fa-edit"></i>
                </td>
            </tr> --}}
        </tbody>
    </table>
    <div class="mt-2">
        {{ $products->links('vendor.livewire.tailwind') }}
    </div>
</div>
