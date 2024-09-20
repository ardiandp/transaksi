<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Transaksi Bulanan</title>
    <!-- Tambahkan CDN Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <form action="{{ route('chart-transaksi') }}" method="get">
            <select name="bulan" onchange="this.form.submit()">
                @foreach ($chartData as $bulan => $data)
                    <option value="{{ $bulan }}" {{ $bulan == request('bulan') ? 'selected' : '' }}>{{ $bulan }}</option>
                @endforeach
            </select>
        </form>
        @if (request('bulan'))
            <h2>Chart Transaksi Per Bulan: {{ request('bulan') }}</h2>
            <canvas id="chart" width="400" height="200"></canvas>

            <script>
                var ctx = document.getElementById('chart').getContext('2d');
                var transaksiChart = new Chart(ctx, {
                    type: 'line', // Tipe chart
                    data: {
                        labels: @json($chartData[request('bulan')]['hari']), // Label hari dalam bulan
                        datasets: [{
                            label: 'Jumlah Transaksi di Bulan {{ request('bulan') }}',
                            data: @json($chartData[request('bulan')]['jumlah']), // Data jumlah transaksi per hari
                            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna background
                            borderColor: 'rgba(54, 162, 235, 1)', // Warna garis
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        @else
            <p>Pilih bulan untuk menampilkan chart</p>
        @endif
    </div>
</body>
</html>

