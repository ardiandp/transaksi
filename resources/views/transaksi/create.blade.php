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
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nama_gerai">Nama Gerai</label>
                <input type="text" class="form-control" id="nama_gerai" name="nama_gerai" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="no_invoice">No Invoice</label>
                <input type="text" value="{{ $next_invoice}}" class="form-control" id="no_invoice" name="no_invoice" required>
            </div>

            <div class="form-group col-md-6">
                <label for="terapist">Terapist</label>
                <input type="text" class="form-control" id="terapist" name="terapist" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pembayaran">Pembayaran</label>
                <input type="text" class="form-control" id="pembayaran" name="pembayaran" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <h3>Detail Transaksi</h3>
                <table class="table table-sm" id="table-detail-transaksi">
                    <thead>
                        <tr>
                            <th>Nama Customer</th>
                            <th>Jenis Perawatan</th>
                            <th>Harga Treatment</th>
                            <th>Diskon</th>
                            <th>Jumlah</th>
                            <th>Komisi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="nama_customer[]" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="jenis_perawatan[]" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" class="form-control" name="harga_treatment[]" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" class="form-control" name="disc[]" >
                            </td>
                            <td>
                                <input type="number" step="0.01" class="form-control" name="jumlah[]" required>
                            </td>
                            <td>
                                <input type="number" step="0.01" class="form-control" name="komisi[]" >
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success" onclick="addRow()"><i class="fa fa-plus"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        function addRow() {
            var table = document.getElementById("table-detail-transaksi");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);

            cell1.innerHTML = "<input type='text' class='form-control' name='nama_customer[]' required>";
            cell2.innerHTML = "<input type='text' class='form-control' name='jenis_perawatan[]' required>";
            cell3.innerHTML = "<input type='number' step='0.01' class='form-control' name='harga_treatment[]' required>";
            cell4.innerHTML = "<input type='number' step='0.01' class='form-control' name='disc[]' >";
            cell5.innerHTML = "<input type='number' step='0.01' class='form-control' name='jumlah[]' required>";
            cell6.innerHTML = "<input type='number' step='0.01' class='form-control' name='komisi[]' >";
            cell7.innerHTML = "<button type='button' class='btn btn-sm btn-danger' onclick='deleteRow(this)'><i class='fa fa-trash'></i></button>";
        }

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("table-detail-transaksi").deleteRow(i);
        }
    </script>
</div>
@endsection
