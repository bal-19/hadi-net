<div class="flex items-center justify-between pb-3 border-b dark:border-gray-700">
    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Total
        Revenue Every Month</h3>

    {{-- select year --}}
    <form id="yearForm" class="me-6">
        <label for="year" class="sr-only">Year select</label>
        <select id="year" name="year"
            class="block py-2.5 px-2 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            @foreach ($years as $year)
                <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>
                    {{ $year }}
                </option>
            @endforeach
        </select>
    </form>
</div>

{{-- chart --}}
<div id="revenueChart" class="w-full mx-auto"></div>

@push('script')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    height: "200%",
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
                    y: {
                        formatter: function(value) {
                            return "IDR " + value.toLocaleString("id-ID");
                        }
                    }
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
                series: [{
                    name: "Total Revenues",
                    data: @json($revenues->pluck('revenue')),
                    color: "#1A56DB",
                }, ],
                xaxis: {
                    categories: @json($revenues->pluck('month')),
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
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
            if (document.getElementById("revenueChart") && typeof ApexCharts !== 'undefined') {
                var chart = new ApexCharts(document.getElementById("revenueChart"), options);
                chart.render();
            }

            // submit form year
            document.getElementById('year').addEventListener('change', function() {
                document.getElementById('yearForm').submit();
            });
        });
    </script>
@endpush
