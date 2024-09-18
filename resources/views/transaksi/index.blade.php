

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transaksi</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Gerai</th>
                                    <th>No Invoice</th>
                                    <th>Nama Customer</th>
                                    <th>Jenis Perawatan</th>
                                    <th>Harga Treatment</th>
                                    <th>Disc</th>
                                    <th>Terapist</th>
                                    <th>Pembayaran</th>
                                    <th>Jumlah</th>
                                    <th>Komisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $transaksi->tanggal }}</td>
                                        <td>{{ $transaksi->nama_gerai }}</td>
                                        <td>{{ $transaksi->no_invoice }}</td>
                                        <td>{{ $transaksi->nama_customer }}</td>
                                        <td>{{ $transaksi->jenis_perawatan }}</td>
                                        <td>Rp {{ number_format($transaksi->harga_treatment, 2) }}</td>
                                        <td>Rp {{ number_format($transaksi->disc, 2) }}</td>
                                        <td>{{ $transaksi->terapist }}</td>
                                        <td>{{ $transaksi->pembayaran }}</td>
                                        <td>Rp {{ number_format($transaksi->jumlah, 2) }}</td>
                                        <td>Rp {{ number_format($transaksi->komisi, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection