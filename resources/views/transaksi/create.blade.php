@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Buat Transaksi Baru</h2>
        <a href="{{ route('transaksi') }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="form-group">
            <label for="nama_gerai">Nama Gerai</label>
            <input type="text" class="form-control" id="nama_gerai" name="nama_gerai" required>
        </div>

        <div class="form-group">
            <label for="no_invoice">No Invoice</label>
            <input type="text" class="form-control" id="no_invoice" name="no_invoice" required>
        </div>

        <div class="form-group">
            <label for="nama_customer">Nama Customer</label>
            <input type="text" class="form-control" id="nama_customer" name="nama_customer" required>
        </div>

        <div class="form-group">
            <label for="jenis_perawatan">Jenis Perawatan</label>
            <input type="text" class="form-control" id="jenis_perawatan" name="jenis_perawatan" required>
        </div>

        <div class="form-group">
            <label for="harga_treatment">Harga Treatment</label>
            <input type="number" step="0.01" class="form-control" id="harga_treatment" name="harga_treatment" required>
        </div>

        <div class="form-group">
            <label for="disc">Diskon</label>
            <input type="number" step="0.01" class="form-control" id="disc" name="disc">
        </div>

        <div class="form-group">
            <label for="terapist">Terapist</label>
            <input type="text" class="form-control" id="terapist" name="terapist" required>
        </div>

        <div class="form-group">
            <label for="pembayaran">Pembayaran</label>
            <input type="text" class="form-control" id="pembayaran" name="pembayaran" required>
        </div>

       
        <div class="form-group">
            <label for="komisi">Komisi</label>
            <input type="number" step="0.01" class="form-control" id="komisi" name="komisi">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
