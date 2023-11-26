<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Dashboard" sub-title="Everything is Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 lg:col-span-3 lg:ml-2">
            <div class="lg:grid lg:grid-cols-3 lg:gap-4 lg:mb-3">
                <div class="lg:col-span-2 sm:pb-2 md:mt-2">
                    <div class="w-full">
                        <h5 class="text-xl font-bold pb-2 leading-none text-gray-900 dark:text-white">Sales Report</h5>
                        <div class="bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 py-2">
                            <div class="grid grid-cols-1 items-center justify-between">
                                <div class="flex gap-2 items-center">
                                    <span class="font-bold text-gray-400 pl-2">Showing For:</span>
                                    <!-- Button -->
                                    <button
                                        id="dropdownDefaultButton"
                                        data-dropdown-toggle="lastDaysdropdown"
                                        data-dropdown-placement="bottom"
                                        class="text-sm font-medium text-gray-700 dark:text-gray-500 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                        type="button"
                                    >
                                        Last 7 days
                                        <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                                            </li>
                                            <li>
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Line Chart -->
                            <div id="area-chart"></div>
                            <a
                                href="#"
                                class="text-sm font-semibold inline-flex items-center rounded-lg text-gray-600 px-3 pt-6">
                                Product Sales Earnings
                            </a>
                        </div>
                    </div>
                </div>
                <div class="rounded bg-white dark:bg-gray-800 sm:mt-2">
                    <div class="w-full">
                        <h5 class="text-xl pb-2 font-bold leading-none text-gray-900 dark:text-white">Earnings</h5>
                        <div class="bg-gray-100 border border-gray-300 rounded-lg dark:bg-gray-800 ">
                            <!-- Line Chart -->
                            <div class="py-6" id="donut-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex gap-6">
                    <span class="font-extrabold hover:cursor-pointer text-primary-one underline underline-offset-2 decoration-4" id="view_orders_btn" onclick="changeOrdersView('orders')">All Orders</span>
                    <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_paid_orders_btn" onclick="changeOrdersView('paid_orders')">Paid</span>
                    <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_pending_orders_btn" onclick="changeOrdersView('pending_orders')">Unpaid</span>
                    <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_cancelled_orders_btn" onclick="changeOrdersView('cancelled_orders')">Cancelled</span>
                    <span class="font-extrabold hover:cursor-pointer text-gray-500" id="view_in_progress_orders_btn" onclick="changeOrdersView('in_progress_orders')">In Progress</span>
                </div>
                {{-- <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-t-2 border-b-2">
                        <tr>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                ID
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Date
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Product
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Quantity
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Country
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Payment
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Fulfilment
                            </th>
                            <th scope="col" class="px-2 py-3 text-gray-900">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                348758
                            </th>
                            <td class="px-2 py-2 text-gray-500">
                                Mar 27, 2023
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Bag of Copper Wire
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                23
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Senegal
                            </td>
                            <td class="px-2 py-2">
                                <span class="bg-green-200 rounded-md px-3">Paid</span>
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Delivered
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Ksh.235,387
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                349854
                            </th>
                            <td class="px-2 py-2 text-gray-500">
                                Apr 30, 2023
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Gold Chains
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                300
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Zambia
                            </td>
                            <td class="px-2 py-2">
                                <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Cancelled
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Ksh.452,453
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                56858
                            </th>
                            <td class="px-2 py-2 text-gray-500">
                                Jan 27, 2023
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Tanzanite
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                180
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Kenya
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                <span class="bg-green-200 rounded-md px-2">Paid</span>
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Delivered
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Ksh.235,387
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                349854
                            </th>
                            <td class="px-2 py-2 text-gray-500">
                                Apr 30, 2023
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Gold Chains
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                300
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Zambia
                            </td>
                            <td class="px-2 py-2">
                                <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Cancelled
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Ksh.452,453
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
                            <th scope="row" class="px-2 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                565434
                            </th>
                            <td class="px-2 py-2 text-gray-500">
                                Apr 26, 2023
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Diamond
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                30
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                South Africa
                            </td>
                            <td class="px-2 py-2">
                                <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Cancelled
                            </td>
                            <td class="px-2 py-2 text-gray-500">
                                Ksh.1,452,453
                            </td>
                        </tr>
                    </tbody>
                </table> --}}
                <div id="orders">
                    <livewire:vendor.dashboard-orders-list />
                </div>

                <div class="hidden" id="paid_orders">
                    <livewire:vendor.dashboard-paid-orders-list />
                </div>

                <div class="hidden" id="pending_orders">
                    <livewire:vendor.dashboard-pending-orders-list />
                </div>

                <div class="hidden" id="cancelled_orders">
                    <livewire:vendor.dashboard-cancelled-orders-list />
                </div>

                <div class="hidden" id="in_progress_orders">
                    <livewire:vendor.dashboard-in-progress-orders-list />
                </div>
            </div>
            <a
                href="{{ route('vendor.orders') }}"
                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-orange-400 hover:text-orange-500 dark:hover:text-orange-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-1">
                View All Orders
                <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </a>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
        <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                const getChartOptions = () => {
                    return {
                        series: [2938349, 874783, 84738, 34748],
                        colors: ["#03A63C", "#D3D3D3", "#025939", "#F2C225"],
                        chart: {
                            height: 335,
                            width: "100%",
                            type: "donut",
                        },
                        stroke: {
                            colors: ["transparent"],
                            lineCap: "",
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            show: true,
                                            fontFamily: "Inter, sans-serif",
                                            fontSize: '8px',
                                            offsetY: -20,
                                        },
                                        total: {
                                            showAlways: true,
                                            show: true,
                                            label: "Balance",
                                            fontFamily: "Inter, sans-serif",
                                            fontSize: '8px',
                                            formatter: function (w) {
                                                const sum = w.globals.seriesTotals.reduce((a, b) => {
                                                    return a + b
                                                }, 0)
                                                return `Ksh.${sum.toLocaleString()}`
                                            },
                                        },
                                        value: {
                                            show: true,
                                            fontFamily: "Inter, sans-serif",
                                            fontSize: '8px',
                                            offsetY: 0,
                                            formatter: function (value) {
                                                return "Ksh."+value.toLocaleString()
                                            },
                                        },
                                    },
                                    size: "80%",
                                },
                            },
                        },
                        grid: {
                            padding: {
                                top: 2,
                            },
                        },
                        labels: ["Income", "Taxes", "Fees", "Email marketing"],
                        dataLabels: {
                            enabled: false,
                        },
                        legend: {
                            position: "bottom",
                            fontFamily: "Inter, sans-serif",
                        },
                        yaxis: {
                            labels: {
                                formatter: function (value) {
                                    return "Ksh." + value.toLocaleString()
                                },
                            },
                        },
                        xaxis: {
                            labels: {
                                formatter: function (value) {
                                    return "Ksh." + value.toLocaleString()
                                },
                            },
                            axisTicks: {
                                show: false,
                            },
                            axisBorder: {
                                show: false,
                            },
                        },
                    }
                }

                if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                    chart.render();

                    // Get all the checkboxes by their class name
                    const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

                    // Function to handle the checkbox change event
                    function handleCheckboxChange(event, chart) {
                        const checkbox = event.target;
                        if (checkbox.checked) {
                            switch(checkbox.value) {
                                case 'desktop':
                                chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                                break;
                                case 'tablet':
                                chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                                break;
                                case 'mobile':
                                chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                                break;
                                default:
                                chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                            }

                        } else {
                            chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                        }
                    }

                    // Attach the event listener to each checkbox
                    checkboxes.forEach((checkbox) => {
                        checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
                    });
                }

                let options = {
                    chart: {
                        height: "120%",
                        maxWidth: "120%",
                        type: "area",
                        fontFamily: "Century Gothic, sans-serif",
                        dropShadow: {
                            enabled: false,
                        },
                        toolbar: {
                            show: false,
                        },
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            opacityFrom: 0.4,
                            opacityTo: 0,
                            shade: "#fb923c",
                            gradientToColors: ["#EE5D32"],
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 4,
                    },
                    grid: {
                        show: true,
                        strokeDashArray: 4,
                        padding: {
                            left: 4,
                            right: 4,
                            top: 0
                        },
                    },
                    series: [
                        {
                            name: "Sales",
                            data: [6500, 6418, 6456, 6526, 6356, 6456],
                            color: "#EE5D32",
                        },
                    ],
                    xaxis: {
                        categories: ['Mar 27', 'Mar 28', 'Mar 29', 'Mar 30', 'mar 31', 'Apr 1', 'Apr 2'],
                        labels: {
                            show: true,
                        },
                        axisBorder: {
                            show: true,
                        },
                        axisTicks: {
                            show: true,
                        },
                    },
                    yaxis: {
                        show: true,
                    },
                }

                if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart"), options);
                    chart.render();
                }
            });
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
