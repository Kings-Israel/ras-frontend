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
                                    </button>
                                    <svg data-dropdown-toggle="lastDaysdropdown" data-dropdown-placement="bottom" class="w-2.5 m-2.5 ml-1.5 hover:cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                    </svg>
                                    <!-- Dropdown menu -->
                                    <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                            <li id="yesterday-chart">
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                            </li>
                                            <li id="today">
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                            </li>
                                            <li id="seven_days">
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                                            </li>
                                            <li id="three_months">
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 3 Months</a>
                                            </li>
                                            <li id="six_months">
                                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 6 Months</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Line Chart -->
                            <div id="area-chart"></div>
                            <div id="area-chart-yesterday" class="hidden"></div>
                            <div id="area-chart-today" class="hidden"></div>
                            <div id="area-chart-three-months" class="hidden"></div>
                            <div id="area-chart-six-months" class="hidden"></div>
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
            let days = {!! json_encode($days) !!}
            let hours = {!! json_encode($hours) !!}
            let formatted_yesterday_hours = {!! json_encode($formatted_yesterday_hours) !!}
            let formatted_past_three_months = {!! json_encode($formatted_past_three_months) !!}
            let formatted_past_six_months = {!! json_encode($formatted_past_six_months) !!}

            let payments_in_last_seven_days = {!! json_encode($payments_in_last_seven_days) !!}
            let payments_yesterday = {!! json_encode($payments_yesterday) !!}
            let payments_today = {!! json_encode($payments_today) !!}
            let payments_in_last_three_months = {!! json_encode($payments_in_last_three_months) !!}
            let payments_in_last_six_months = {!! json_encode($payments_in_last_six_months) !!}

            let wallet_balance = {!! json_encode($wallet_balance) !!}

            let categories_names = {!! json_encode($top_categories_names) !!}
            let categories_percentages = {!! json_encode($top_categories_percentages) !!}
            let categories_colors = {!! json_encode($top_categories_colors) !!}
            // ApexCharts options and config
            window.addEventListener("load", function() {
                const getChartOptions = () => {
                    return {
                        series: categories_percentages,
                        colors: categories_colors,
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
                                                return `Ksh.${wallet_balance.toLocaleString()}`
                                            },
                                        },
                                        value: {
                                            show: true,
                                            fontFamily: "Inter, sans-serif",
                                            fontSize: '8px',
                                            offsetY: 0,
                                            formatter: function (value) {
                                                return wallet_balance.toLocaleString()
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
                        labels: categories_names,
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
                                    return value.toLocaleString() + "%"
                                },
                            },
                        },
                        xaxis: {
                            labels: {
                                formatter: function (value) {
                                    return "Ksh. " + value.toLocaleString()
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
                            data: payments_in_last_seven_days,
                            color: "#EE5D32",
                        },
                    ],
                    xaxis: {
                        categories: days,
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

                let today_chart_options = {
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
                            data: payments_today,
                            color: "#EE5D32",
                        },
                    ],
                    xaxis: {
                        categories: hours,
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

                let yesterday_chart_options = {
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
                            data: payments_yesterday,
                            color: "#EE5D32",
                        },
                    ],
                    xaxis: {
                        categories: formatted_yesterday_hours,
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

                let three_months_chart_options = {
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
                            data: payments_in_last_three_months,
                            color: "#EE5D32",
                        },
                    ],
                    xaxis: {
                        categories: formatted_past_three_months,
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

                let six_months_chart_options = {
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
                            data: payments_in_last_six_months,
                            color: "#EE5D32",
                        },
                    ],
                    xaxis: {
                        categories: formatted_past_six_months,
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

                if (document.getElementById("area-chart-yesterday") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart-yesterday"), yesterday_chart_options);
                    chart.render();
                }

                if (document.getElementById("area-chart-today") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart-today"), today_chart_options);
                    chart.render();
                }

                if (document.getElementById("area-chart-three-months") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart-three-months"), three_months_chart_options);
                    chart.render();
                }

                if (document.getElementById("area-chart-six-months") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart-six-months"), six_months_chart_options);
                    chart.render();
                }

                // Show Yesterday chart
                document.getElementById('yesterday-chart').addEventListener("click", function(e) {
                    document.getElementById('area-chart').classList.add('hidden')
                    document.getElementById('area-chart-today').classList.add('hidden')
                    document.getElementById('area-chart-three-months').classList.add('hidden')
                    document.getElementById('area-chart-six-months').classList.add('hidden')
                    document.getElementById('area-chart-yesterday').classList.remove('hidden')
                    document.getElementById('dropdownDefaultButton').innerHTML = 'Yesterday'
                })

                // Show Today Chart
                document.getElementById('today').addEventListener("click", function(e) {
                    document.getElementById('area-chart').classList.add('hidden')
                    document.getElementById('area-chart-three-months').classList.add('hidden')
                    document.getElementById('area-chart-six-months').classList.add('hidden')
                    document.getElementById('area-chart-yesterday').classList.add('hidden')
                    document.getElementById('area-chart-today').classList.remove('hidden')
                    document.getElementById('dropdownDefaultButton').innerHTML = 'Today'
                })

                // Show Sevent days chart
                document.getElementById('seven_days').addEventListener("click", function(e) {
                    document.getElementById('area-chart-today').classList.add('hidden')
                    document.getElementById('area-chart-three-months').classList.add('hidden')
                    document.getElementById('area-chart-six-months').classList.add('hidden')
                    document.getElementById('area-chart-yesterday').classList.add('hidden')
                    document.getElementById('area-chart').classList.remove('hidden')
                    document.getElementById('dropdownDefaultButton').innerHTML = 'Last 7 days'
                })

                // Show Three months chart
                document.getElementById('three_months').addEventListener("click", function(e) {
                    document.getElementById('area-chart').classList.add('hidden')
                    document.getElementById('area-chart-today').classList.add('hidden')
                    document.getElementById('area-chart-six-months').classList.add('hidden')
                    document.getElementById('area-chart-yesterday').classList.add('hidden')
                    document.getElementById('area-chart-three-months').classList.remove('hidden')
                    document.getElementById('dropdownDefaultButton').innerHTML = 'Last 3 Months'
                })

                // Show Six months chart
                document.getElementById('six_months').addEventListener("click", function(e) {
                    document.getElementById('area-chart').classList.add('hidden')
                    document.getElementById('area-chart-today').classList.add('hidden')
                    document.getElementById('area-chart-three-months').classList.add('hidden')
                    document.getElementById('area-chart-yesterday').classList.add('hidden')
                    document.getElementById('area-chart-six-months').classList.remove('hidden')
                    document.getElementById('dropdownDefaultButton').innerHTML = 'Last 6 Months'
                })
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
