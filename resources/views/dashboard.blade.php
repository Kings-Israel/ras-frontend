<x-app-layout>
    <!-- Page Heading -->
    <x-page-nav-header main-title="Dashboard" sub-title="Everything is Here..." />
    <div class="p-3 sm:ml-64 lg:grid lg:grid-cols-4 lg:divide-x">
        <div class="p-3 md:col-span-3">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="rounded bg-gray-300 col-span-2">
                    <div class="w-full bg-white shadow dark:bg-gray-800 md:p-2">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Sales Report</h5>

                        <!-- Line Chart -->
                        <div id="area-chart"></div>
                    </div>
                </div>
                <div class="rounded bg-gray-300 dark:bg-gray-800">
                    <div class="max-w-sm w-full bg-white shadow dark:bg-gray-800 md:p-2">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Earnings</h5>

                        <!-- Line Chart -->
                        <div class="py-6" id="donut-chart"></div>
                    </div>
                </div>
            </div>
            <div class="h-48 mb-4">
                <div class="flex gap-2">
                    <span class="font-extrabold text-orange-400 underline underline-offset-2 decoration-4">All Orders</span>
                    <span class="font-extrabold text-gray-400">Paid</span>
                    <span class="font-extrabold text-gray-400">Unpaid</span>
                    <span class="font-extrabold text-gray-400">Cancelled</span>
                    <span class="font-extrabold text-gray-400">In Progress</span>
                </div>
                <table class="w-full table-auto text-sm text-left text-gray-800 font-bold dark:text-gray-400 truncate">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-t-2 border-b-2">
                        <tr>
                            {{-- <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th> --}}
                            <th scope="col" class="px-2 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Country
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Payment
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Fulfilment
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Amount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{-- <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td> --}}
                            <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                348758
                            </th>
                            <td class="px-2 py-4">
                                Mar 27, 2023
                            </td>
                            <td class="px-2 py-4">
                                Bag of Copper Wire
                            </td>
                            <td class="px-2 py-4">
                                23
                            </td>
                            <td class="px-2 py-4">
                                Senegal
                            </td>
                            <td class="px-2 py-4">
                                <span class="bg-green-200 rounded-md px-3">Paid</span>
                            </td>
                            <td class="px-2 py-4">
                                Delivered
                            </td>
                            <td class="px-2 py-4">
                                Ksh.235,387
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{-- <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td> --}}
                            <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                349854
                            </th>
                            <td class="px-2 py-4">
                                Apr 30, 2023
                            </td>
                            <td class="px-2 py-4">
                                Gold Chains
                            </td>
                            <td class="px-2 py-4">
                                300
                            </td>
                            <td class="px-2 py-4">
                                Zambia
                            </td>
                            <td class="px-2 py-4">
                                <span class="bg-gray-200 rounded-md px-3">Unpaid</span>
                            </td>
                            <td class="px-2 py-4">
                                Cancelled
                            </td>
                            <td class="px-2 py-4">
                                Ksh.452,453
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            {{-- <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td> --}}
                            <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                56858
                            </th>
                            <td class="px-2 py-4">
                                Jan 27, 2023
                            </td>
                            <td class="px-2 py-4">
                                Tanzanite
                            </td>
                            <td class="px-2 py-4">
                                180
                            </td>
                            <td class="px-2 py-4">
                                Kenya
                            </td>
                            <td class="px-2 py-4">
                                <span class="bg-green-200 rounded-md px-2">Paid</span>
                            </td>
                            <td class="px-2 py-4">
                                Delivered
                            </td>
                            <td class="px-2 py-4">
                                Ksh.235,387
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <x-right-side-bar />
    </div>
    @push('scripts')
        <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                console.log('Loaded')
                const getChartOptions = () => {
                    return {
                        series: [35.1, 23.5, 2.4, 5.4],
                        colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                        chart: {
                            height: 320,
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
                                    offsetY: 20,
                                    },
                                    total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Unique visitors",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function (w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                        return a + b
                                        }, 0)
                                        return `${sum}k`
                                    },
                                    },
                                    value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function (value) {
                                        return value + "k"
                                    },
                                    },
                                },
                                size: "80%",
                                },
                            },
                        },
                        grid: {
                            padding: {
                                top: -2,
                            },
                        },
                        labels: ["Direct", "Sponsor", "Affiliate", "Email marketing"],
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
                                return value + "k"
                                },
                            },
                        },
                        xaxis: {
                            labels: {
                                formatter: function (value) {
                                return value  + "k"
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
                        height: "100%",
                        maxWidth: "100%",
                        type: "area",
                        fontFamily: "Inter, sans-serif",
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
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        width: 6,
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                        left: 2,
                        right: 2,
                        top: 0
                        },
                    },
                    series: [
                        {
                        name: "New users",
                        data: [6500, 6418, 6456, 6526, 6356, 6456],
                        color: "#1A56DB",
                        },
                    ],
                    xaxis: {
                        categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
                        labels: {
                        show: false,
                        },
                        axisBorder: {
                        show: false,
                        },
                        axisTicks: {
                        show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                }

                if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("area-chart"), options);
                    chart.render();
                }
            });
        </script>
    @endpush
</x-app-layout>
