<canvas id="revenueChart"></canvas>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('revenueChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($key),
                datasets: [{
                    label: 'Total Revenue',
                    data: @json($value),
                    fill: true,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(255, 205, 86, 0.2)',
                    tension: 0.1
                }]
            }
        })
    });
</script>
