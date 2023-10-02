<x-app-layout>
    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
    @endsection
    <!-- Page Heading -->
    <x-page-nav-header main-title="Products" sub-title="All Your Products Are Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div>
                <x-primary-button class="py-2 font-light bg-primary-one tracking-wide -mt-2 mb-2 focus:ring-2 focus:ring-primary-one px-8 text-sm" data-modal-target="add-product-modal" data-modal-toggle="add-product-modal">Add Product</x-primary-button>

                <x-modal modal_id="add-product-modal">
                    <div class="relative w-full max-w-4xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-product-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-2 py-2 lg:px-4">
                                <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">New Product</h3>
                                {{-- <livewire:add-product /> --}}
                                @include('business.product.create')
                            </div>
                        </div>
                    </div>
                </x-modal>

            </div>
            <livewire:vendor.products-list />
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/tagify/tagify.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
        <script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
        <script src="{{ asset('assets/js/product-wizard.js') }}"></script>
    @endpush
</x-app-layout>
