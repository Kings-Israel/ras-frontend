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
    <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
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
    <livewire:buyer.cart-list />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        let order_price = document.getElementById('order_price')

        let total_amount = document.getElementById('total_cart_amount');

        $(document).ready(function () {
            total_amount.innerHTML = new Intl.NumberFormat().format(total_amount.innerHTML)
        })

        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let element = target.attributes['data-cart-id'].value
            let product_min_price = target.attributes['data-min-price'].value
            let product_max_price = target.attributes['data-max-price'].value
            let product_min_order_quantity = target.attributes['data-min-order-quantity'].value
            let product_max_order_quantity = target.attributes['data-max-order-quantity'].value
            let min_value = target.attributes['min'].value
            let value = Number(target.value);
            value--;
            if (value < min_value) {
                target.value = min_value;
                document.getElementById('min_order_warning').classList.remove('hidden')
                setTimeout(() => {
                    document.getElementById('min_order_warning').classList.add('hidden')
                }, 4000);
            } else {
                target.value = value;
            }
            let new_amount = Number(total_amount.innerHTML.replaceAll(',', ''))
            let old_amount = document.getElementById('order_price_'+element).innerHTML
            let updated_amount = calculatePrice(element, target.value, product_min_order_quantity, product_max_order_quantity, product_min_price, product_max_price)
            total_amount.innerHTML = new Intl.NumberFormat().format(Number((new_amount - old_amount) + updated_amount))
        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
                'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let element = target.attributes['data-cart-id'].value
            let product_min_price = target.attributes['data-min-price'].value
            let product_max_price = target.attributes['data-max-price'].value
            let product_min_order_quantity = target.attributes['data-min-order-quantity'].value
            let product_max_order_quantity = target.attributes['data-max-order-quantity'].value
            let max_value = target.attributes['max'].value
            let value = Number(target.value);
            value++;
            if (value > max_value) {
                target.value = max_value;
                document.getElementById('max_order_warning').classList.remove('hidden')
                setTimeout(() => {
                    document.getElementById('max_order_warning').classList.add('hidden')
                }, 4000);
            } else {
                target.value = value;
            }

            let new_amount = Number(total_amount.innerHTML.replaceAll(',', ''))
            let old_amount = document.getElementById('order_price_'+element).innerHTML
            let updated_amount = calculatePrice(element, target.value, product_min_order_quantity, product_max_order_quantity, product_min_price, product_max_price)
            total_amount.innerHTML = new Intl.NumberFormat().format(Number((new_amount - old_amount) + updated_amount))
        }

        function calculatePrice(element, quantity, min_order_quantity, max_order_quantity, min_product_price, max_product_price) {
            order_quantity = quantity

            let calculated_price = 0

            let order_quantity_middle = Math.round((Number(min_order_quantity) + Number(max_order_quantity)) / 2)

            let product_price_middle = Math.round((Number(min_product_price) + Number(max_product_price)) / 2)

            // if price available, multiply price by the order quantity
            // If price is not available, multiply minimun price by the order quantity
            if (min_product_price && max_product_price) {
                if (order_quantity < order_quantity_middle) {
                    calculated_price = max_product_price * order_quantity
                } else if (order_quantity > max_order_quantity) {
                    calculated_price = min_product_price * order_quantity
                } else {
                    calculated_price = product_price_middle * order_quantity
                }
            } else {
                calculated_price = product_price * order_quantity
            }

            document.getElementById('order_price_'+element).innerHTML = new Intl.NumberFormat().format(calculated_price)

            return calculated_price
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
