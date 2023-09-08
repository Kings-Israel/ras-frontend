<x-main>
    <style>
        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
    </style>
    <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-20 z-30">
        <form class="md:w-2/5 md:my-auto">
            <div class="flex">
                <button id="dropdown-button" data-dropdown-toggle="store-dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-800 space-x-3" type="button">
                    <i class="fas fa-bars"></i>
                    <span class="">
                        Categories
                    </span>
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="store-dropdown" class="z-40 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Diamonds</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanzanite</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gold</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Uranium</button>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
    <div class="flex px-32 p-4 gap-12">
        <div class="basis-3/5 bg-gray-50 p-2 rounded-lg">
            <div>
                <h3 class="text-3xl text-gray-600 font-bold">Shopping Cart</h3>
                <span class="flex gap-2 divide-x-2 divide-gray-300">
                    <div class="flex gap-2">
                        <h3 class="text-gray-500 font-bold">Enock's Mining Co.</h3>
                        <h6 class="text-sm text-gray-500">Verified</h6>
                    </div>
                    <h6 class="text-sm text-gray-500 pl-2">2 Years</h6>
                </span>
            </div>
            <div class="space-y-2">
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-thin text-sm">Select All Items</h2>
                        </div>
                        <i class="fas fa-trash-alt my-auto text-gray-500"></i>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <img src="{{ asset('assets/img/3skZmX.jpg') }}" alt="" class="w-10 h-10 lg:w-20 lg:h-20 object-cover rounded-md border border-orange-400">
                            <span class="text-gray-500 text-sm w-32 flex-wrap">24K Gold Plated Customized Metal Bar</span>
                            <div class="custom-number-input h-10 w-32 my-auto">
                                <div class="flex flex-row h-8 w-full rounded-lg relative bg-transparent mt-1">
                                    <button data-action="decrement" class=" bg-gray-200 mr-0.5 border-2 rounded-tl-lg rounded-bl-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                        <span class="m-auto text-xl font-thin">-</span>
                                    </button>
                                    <input type="number" class="border-0 outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700" name="custom-input-number" value="2" />
                                    <button data-action="increment" class="bg-gray-200 ml-0.5 border-2 rounded-tr-lg rounded-br-lg border-gray-400 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                        <span class="m-auto text-xl font-thin">+</span>
                                    </button>
                                </div>
                            </div>
                            <span class="text-gray-500 text-sm font-bold my-auto mr-2">Pieces</span>
                            <select name="" id="" class="text-sm font-bold border border-gray-400 rounded-md h-8 p-1 my-auto">
                                <option value="">Color & Size</option>
                            </select>
                            <span class="font-bold text-gray-600 my-auto">US$50.86</span>
                        </div>
                        <i class="fas fa-trash-alt my-auto text-gray-500"></i>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Shipping</h2>
                        </div>
                        <span class="flex gap-1 my-auto">
                            <i class="fas fa-map-marker-alt my-auto text-red-600"></i>
                            <p class="text-sm font-bold text-blue-500 tracking-tight">Add Your Address</p>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Warehousing</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between border border-gray-200 rounded-lg p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Financing</h2>
                        </div>
                        <span class="my-auto">
                            <p class="text-sm font-bold text-blue-500 tracking-tight">Credit Limit $6,700.00</p>
                        </span>
                    </div>
                </div>
                <div>
                    <textarea name="" cols="85" rows="5" class="border border-gray-300 rounded-lg placeholder-gray-400" placeholder="Additional Notes"></textarea>
                </div>
                <div>
                    <div class="flex justify-between p-2">
                        <div class="flex gap-2 px-2 text-gray-500">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 my-auto text-orange-600 bg-gray-100 border-gray-400 rounded focus:ring-orange-500 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-1 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            <h2 class="font-semibold text-sm">Agree to share contact information with the vendor</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-2/5">
            <div class="border border-gray-300 p-4 space-y-4 rounded-lg">
                <div>
                    <h4 class="text-sm font-bold">Cart Subtotal:</h4>
                    <h3 class="font-bold text-xl">US$55.86</h3>
                </div>
                <div>
                    <h4 class="text-gray-500">Delivery: <strong class="font-bold">Friday, August 18</strong></h4>
                    <h5 class="font-thin text-gray-500 text-sm">Order Within: <span class="text-green-600">19h 38min</span></h5>
                </div>
                <x-primary-button class="w-full my-2 py-2">
                    <span class="tracking-tight">
                        Checkout
                    </span>
                </x-primary-button>
            </div>
        </div>
    </div>
    <script>
        function decrement(e) {
          const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
          );
          const target = btn.nextElementSibling;
          let value = Number(target.value);
          value--;
          target.value = value;
        }

        function increment(e) {
          const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
          );
          const target = btn.nextElementSibling;
          let value = Number(target.value);
          value++;
          target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
          `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
          `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
          btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
          btn.addEventListener("click", increment);
        });
      </script>
</x-main>
