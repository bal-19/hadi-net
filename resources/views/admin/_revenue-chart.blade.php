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
<canvas id="revenueChart"></canvas>

@push('script')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('revenueChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($revenues->pluck('month')),
                    datasets: [{
                        label: 'Total Revenue',
                        data: @json($revenues->pluck('revenue')),
                        fill: true,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                }
            });

            document.getElementById('year').addEventListener('change', function() {
                document.getElementById('yearForm').submit();
            });
        });
    </script>
@endpush
