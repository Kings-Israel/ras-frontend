<x-app-layout>
    <style>
        .childTableRow {
            display: none;
        }
        .selected {
            background: #F3F4F6
        }
    </style>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Orders" sub-title="All Customer Orders Are Here" />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <h3 class="text-xl font-bold my-2">Orders In Progress</h3>
            <livewire:vendor.orders.view-in-progress-orders />

            <h3 class="text-xl font-bold my-2 mt-8">Recent Orders</h3>
            <div class="flex gap-6">
                <span class="font-extrabold hover:cursor-pointer text-primary-one underline underline-offset-2 decoration-4" id="view_orders_btn" onclick="changeOrdersView('orders')">All Orders</span>
                <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_paid_orders_btn" onclick="changeOrdersView('paid_orders')">Paid</span>
                <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_pending_orders_btn" onclick="changeOrdersView('pending_orders')">Unpaid</span>
                <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_cancelled_orders_btn" onclick="changeOrdersView('cancelled_orders')">Cancelled</span>
                <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_in_progress_orders_btn" onclick="changeOrdersView('in_progress_orders')">In Progress</span>
            </div>
            <div id="orders">
                <livewire:vendor.orders.all-orders />
            </div>

            <div class="hidden" id="paid_orders">
                <livewire:vendor.orders.paid-orders />
            </div>

            <div class="hidden" id="pending_orders">
                <livewire:vendor.orders.pending-payment-orders />
            </div>

            <div class="hidden" id="cancelled_orders">
                <livewire:vendor.orders.cancelled-orders />
            </div>

            <div class="hidden" id="in_progress_orders">
                <livewire:vendor.orders.in-progress-orders />
            </div>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script>
        $(function() {
            $('.expandChildTable').on('click', function() {
                $(this).toggleClass('bg-gray-50')
                $(this).toggleClass('selected').closest('tr').next().toggle();
            })
        });
        </script>
        <script>
            function showRow() {
                var x = document.getElementsByClassName('hidden-row')[0];
                if (x.style.display === "none" || x.style.display === "") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
        <script>
            const orders_btn = document.querySelector('#view_orders_btn');
            const paid_orders_btn = document.querySelector('#view_paid_orders_btn');
            const pending_orders_btn = document.querySelector('#view_pending_orders_btn');
            const cancelled_orders_btn = document.querySelector('#view_cancelled_orders_btn');
            const in_progress_orders_btn = document.querySelector('#view_in_progress_orders_btn');

            const orders = document.querySelector('#orders');
            const paid_orders = document.querySelector('#paid_orders');
            const pending_orders = document.querySelector('#pending_orders');
            const cancelled_orders = document.querySelector('#cancelled_orders');
            const in_progress_orders = document.querySelector('#in_progress_orders');

            let views = [orders, paid_orders, pending_orders, cancelled_orders, in_progress_orders]
            let views_btns = [orders_btn, paid_orders_btn, pending_orders_btn, cancelled_orders_btn, in_progress_orders_btn]

            function changeOrdersView(selected_view) {
                views.forEach(view => {
                    if (selected_view == view.attributes.id.value) {
                        view.classList.remove('hidden')
                    } else {
                        view.classList.add('hidden')
                    }
                });

                views_btns.forEach(btn => {
                    if ('view_'+selected_view+'_btn' == btn.attributes.id.value) {
                        btn.classList.add('text-primary-one', 'underline', 'underline-offset-2', 'decoration-4')
                        btn.classList.remove('text-gray-500')
                    } else {
                        btn.classList.remove('text-primary-one', 'underline', 'underline-offset-2', 'decoration-4')
                        btn.classList.add('text-gray-500')
                    }
                })
            }
        </script>
    @endpush
</x-app-layout>
