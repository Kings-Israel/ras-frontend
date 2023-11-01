<x-modal modal_id="cart-select-location">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-product-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-2 py-2 lg:px-4">
                <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">Enter Delivery Location</h3>
                <input id="place_id" type="hidden" name="place_id">
                <input type="text" name="delivery_location" id="pac-input" placeholder="Search location here" class="form-control mb-2 border-2 border-gray-200 w-full rounded-md focus:border-1 focus:border-gray-400 transition duration-150 ease-in-out">
                <div id="gmap_markers" class="gmap block h-[96%]"></div>
            </div>
        </div>
    </div>
</x-modal>
