<x-app-layout>
    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
        <style>
            [x-cloak] {
                display: none;
            }
        </style>
    @endsection
    <!-- Page Heading -->
    <x-page-nav-header main-title="Products" sub-title="All Your Products Are Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div>
                <x-primary-button class="py-2 font-light bg-primary-one tracking-wide -mt-2 mb-2 focus:ring-2 focus:ring-primary-one px-8" data-modal-target="add-product-modal" data-modal-toggle="add-product-modal">Add Product</x-primary-button>

                <x-modal modal_id="add-product-modal">
                    <div class="relative w-full max-w-4xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" data-modal-hide="add-product-modal" class="absolute top-1 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-2 py-2 lg:px-4">
                                <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white space-y-4">New Product</h3>
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
        <script>
            // function showCapacityInput() {
            //     let selected_warehouse = $('#link_to_warehouse').find(':selected').val()
            //     if (selected_warehouse === '') {
            //         $('#product_capacity').addClass('hidden')
            //     } else {
            //         $('#product_capacity').removeClass('hidden')
            //     }
            // }
            function enterCustom(value, element_id) {
                if (value.checked) {
                    $('#'+element_id).addClass('hidden')
                    $('#'+element_id).removeClass('block')
                    $('#custom_'+element_id).addClass('block')
                    $('#custom_'+element_id).removeClass('hidden')
                    $('#custom_'+element_id).focus()
                } else {
                    $('#'+element_id).addClass('block')
                    $('#'+element_id).removeClass('hidden')
                    $('#'+element_id).focus()
                    $('#custom_'+element_id).addClass('hidden')
                    $('#custom_'+element_id).removeClass('block')
                }
            }

            function setInput(input) {
                $('#'+input).val($('#custom_'+input).val())
            }

            function dropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {
                        if (!this.options[index].selected) {

                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);
                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }
                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }

            let selected_warehouses = []
            function getSelectedWarehouses(product) {
                let warehouses = product.warehouses

                warehouses.forEach(warehouse => {
                    selected_warehouses.push(warehouse.id)
                });
            }

            function updateWarehouses(product) {
                let warehouses = product.warehouses

                warehouses.forEach(warehouse => {
                    selected_warehouses.push(warehouse.id)
                });

                return {
                    options: [],
                    selected: [...selected_warehouses],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {
                        if (!this.options[index].selected) {
                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);
                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }
                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
