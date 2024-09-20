<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Bulanan</title>
    <!-- Tambahkan CDN Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form action="{{ route('chart-transaksi') }}" method="get">
                    <select name="bulan" onchange="this.form.submit()">
                        @foreach ($chartData as $bulan => $data)
                            <option value="{{ $bulan }}" {{ $bulan == request('bulan') ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="col-md-9">
                @if (request('bulan'))
                    <h2>Laporan Transaksi Per Bulan: {{ request('bulan') }}</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <canvas id="chart-bar" width="200" height="200"></canvas>
                            <script>
                                var ctx = document.getElementById('chart-bar').getContext('2d');
                                var transaksiChartBar = new Chart(ctx, {
                                    type: 'bar', // Tipe chart
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
                        </div>
                        <div class="col-md-3">
                            <canvas id="chart-donat" width="200" height="200"></canvas>
                            <script>
                                var ctx = document.getElementById('chart-donat').getContext('2d');
                                var transaksiChartDonat = new Chart(ctx, {
                                    type: 'doughnut', // Tipe chart
                                    data: {
                                        labels: @json($chartData[request('bulan')]['hari']), // Label hari dalam bulan
                                        datasets: [{
                                            label: 'Jumlah Transaksi di Bulan {{ request('bulan') }}',
                                            data: @json($chartData[request('bulan')]['jumlah']), // Data jumlah transaksi per hari
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        aspectRatio: 1
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-3">
                            <canvas id="chart-garis" width="200" height="200"></canvas>
                            <script>
                                var ctx = document.getElementById('chart-garis').getContext('2d');
                                var transaksiChartGaris = new Chart(ctx, {
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
                        </div>
                        <div class="col-md-3">
                            <canvas id="chart-pie" width="200" height="200"></canvas>
                            <script>
                                var ctx = document.getElementById('chart-pie').getContext('2d');
                                var transaksiChartPie = new Chart(ctx, {
                                    type: 'pie', // Tipe chart
                                    data: {
                                        labels: @json($chartData[request('bulan')]['hari']), // Label hari dalam bulan
                                        datasets: [{
                                            label: 'Jumlah Transaksi di Bulan {{ request('bulan') }}',
                                            data: @json($chartData[request('bulan')]['jumlah']), // Data jumlah transaksi per hari
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        aspectRatio: 1
                                    }
                                });
                            </script>
                        </div>
                    </div>
                @else
                    <p>Pilih bulan untuk menampilkan chart</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

