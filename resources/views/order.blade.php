<x-main>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/tagify/tagify.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

    <div class="">
        <div class="bg-gray-200 mx-auto px-1 md:px-8 lg:px-24 py-1 sticky top-16 z-30">
            <x-nav-categories></x-nav-categories>
        </div>
        <span class="lg:flex lg:px-28 mt-2 gap-2 text-sm">
            <a href="{{ route('welcome') }}" class="text-gray-500">Home ></a>
            <a href="{{ route('orders') }}" class="text-gray-500">Orders ></a>
            <span>{{ Str::upper($order->order_id) }}</span>
        </span>
        <div class="hidden lg:flex lg:px-28 mt-2">
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-400 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center text-primary-one">
                    Order <span class="hidden sm:inline-flex sm:ms-2">Request</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center @if($order->status == 'quotation request' || $order->status == 'accepted' || $order->status == 'pending' || $order->invoice->payment_status == 'paid') text-primary-one @endif hover:cursor-pointer" id="negotiations">
                    Negotiating
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center @if($order->status == 'pending' || $order->invoice->payment_status == 'paid') text-primary-one hover:cursor-pointer @endif" @if($order->status == 'pending' || $order->invoice->payment_status == 'paid') id="order-confirmed" @endif>
                    Order <span class="hidden sm:inline-flex sm:ms-2"> Confirmed </span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center @if($order->invoice->payment_status == 'paid') text-primary-one hover:cursor-pointer @endif" @if($order->invoice->payment_status == 'paid') id="order-paid" @endif>
                    Funded <span class="hidden sm:inline-flex sm:ms-2"> To Escrow </span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center @if($order->delivery_status == 'delivered') text-primary-one hover:cursor-pointer @endif" @if($order->delivery_status == 'delivered') id="order-shipped" @endif>
                    Shipped
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4"/>
                    </svg>
                </li>
                <li class="flex items-center" id="order-complete">
                    Order <span class="hidden sm:inline-flex sm:ms-2"> Complete </span>
                </li>
            </ol>
        </div>
        <section class="hidden" id="negotiations-section">
            @include('partials.order.negotiations')
        </section>
        <section class="hidden" id="order-confirmed-section">
            @include('partials.order.confirmed')
        </section>
        <section class="hidden" id="order-paid-section">
            @include('partials.order.paid')
        </section>
        <section class="hidden" id="order-shipped-section">
            @include('partials.order.shipped')
        </section>
    </div>
    <!-- Scripts -->
    {{-- <script src="{{ asset('assets/js/jquery-1.12.4.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/js/financing-request-wizard.js') }}"></script>
    <script>
        const order_status = {!! json_encode($order->status) !!}
        const order_delivery_status = {!! json_encode($order->delivery_status) !!}
        const negotiations = document.querySelector('#negotiations')
        const negotiations_section = document.querySelector('#negotiations-section')
        const order_confirmed = document.querySelector('#order-confirmed')
        const order_confirmed_section = document.querySelector('#order-confirmed-section')
        const order_paid = document.querySelector('#order-paid')
        const order_paid_section = document.querySelector('#order-paid-section')
        const order_shipped = document.querySelector('#order-shipped')
        const order_shipped_section = document.querySelector('#order-shipped-section')

        console.log(order_delivery_status)

        switch (order_status) {
            case 'quotation request':
                negotiations_section.classList.remove('hidden')
                negotiations.classList.add('underline')
                break;
            case 'pending':
                order_confirmed_section.classList.remove('hidden')
                order_confirmed.classList.add('underline')
                break;
            case 'in progress':
                if (order_delivery_status == 'delivered') {
                    order_shipped_section.classList.remove('hidden')
                    order_shipped.classList.add('underline')
                } else {
                    order_paid_section.classList.remove('hidden')
                    order_paid.classList.add('underline')
                }
                break;
            default:
                negotiations_section.classList.remove('hidden')
                negotiations.classList.add('underline')
                break;
        }

        negotiations.addEventListener('click', function () {
            negotiations_section.classList.remove('hidden')
            negotiations.classList.add('underline')
            order_confirmed_section.classList.add('hidden')
            order_confirmed.classList.remove('underline')
            order_paid_section.classList.add('hidden')
            order_paid.classList.remove('underline')
            order_shipped_section.classList.add('hidden')
            order_shipped.classList.remove('underline')
        })

        if (order_confirmed) {
            order_confirmed.addEventListener('click', function () {
                order_confirmed_section.classList.remove('hidden')
                order_confirmed.classList.add('underline')
                negotiations_section.classList.add('hidden')
                negotiations.classList.remove('underline')
                order_paid_section.classList.add('hidden')
                order_paid.classList.remove('underline')
                order_shipped_section.classList.add('hidden')
                order_shipped.classList.remove('underline')
            })
        }

        if (order_paid) {
            order_paid.addEventListener('click', function () {
                order_paid_section.classList.remove('hidden')
                order_paid.classList.add('underline')
                order_confirmed_section.classList.add('hidden')
                order_confirmed.classList.remove('underline')
                negotiations_section.classList.add('hidden')
                negotiations.classList.remove('underline')
                order_shipped_section.classList.add('hidden')
                order_shipped.classList.remove('underline')
            })
        }

        if (order_shipped) {
            order_shipped.addEventListener('click', function () {
                order_shipped_section.classList.remove('hidden')
                order_shipped.classList.add('underline')
                order_paid_section.classList.add('hidden')
                order_paid.classList.remove('underline')
                order_confirmed_section.classList.add('hidden')
                order_confirmed.classList.remove('underline')
                negotiations_section.classList.add('hidden')
                negotiations.classList.remove('underline')
            })
        }

        $('#pay-form').on('submit', function(e) {
            e.preventDefault();
            $('#pay-order-btn').attr('disabled', 'disabled');
            $('#pay-order-btn').addClass('bg-orange-400');
            $('#pay-order-btn').removeClass('bg-primary-one');
            $('#pay-order-btn').html('Processing...');
            let formData = $(this).serializeArray()
            $.ajax({
                method: "POST",
                dataType: 'json',
                headers: {
                    Accept: 'application/json'
                },
                url: "{{ route('wallet.pay') }}",
                data: formData,
                success: (response) => {
                    $('#transaction_ref').val(response.ref)
                    $('#confirm-payment-btn').click()
                    $('#pay-order-btn').removeAttr('disabled');
                    $('#pay-order-btn').removeClass('bg-orange-400');
                    $('#pay-order-btn').addClass('bg-primary-one');
                    $('#pay-order-btn').html('Pay For Order');
                },
                error: (response) => {
                    if (response.status == 301) {
                        window.location.href = response.responseJSON.route
                        // console.log(response.responseJSON.route)
                    }
                    $('#pay-order-btn').removeAttr('disabled');
                    $('#pay-order-btn').removeClass('bg-orange-400');
                    $('#pay-order-btn').addClass('bg-primary-one');
                    $('#pay-order-btn').html('Pay For Order');
                }
            })
        })
    </script>
</x-main>
