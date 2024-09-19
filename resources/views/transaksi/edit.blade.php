@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Edit Transaksi</h2>
        <a href="{{ route('transaksi') }}" class="btn btn-sm btn-secondary">Kembali</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('transaksi.update', $transaksi->no_invoice) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $transaksi->tanggal }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nama_gerai">Nama Gerai</label>
                <input type="text" class="form-control" id="nama_gerai" name="nama_gerai" value="{{ $transaksi->nama_gerai }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="no_invoice">No Invoice</label>
                <input type="text" class="form-control" id="no_invoice" name="no_invoice" value="{{ $transaksi->no_invoice }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nama_customer">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ $transaksi->nama_customer }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Detail Transaksi</label>
                <table class="table table-sm" id="table-detail-transaksi">
                    <thead>
                        <tr>
                            <th>Jenis Perawatan</th>
                            <th>Harga Treatment</th>
                            <th>Diskon</th>
                            <th>Jumlah</th>
                            <th>Komisi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi_detail as $key => $detail)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="jenis_perawatan[]" value="{{ $detail->jenis_perawatan }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control" name="harga_treatment[]" value="{{ $detail->harga_treatment }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control" name="disc[]" value="{{ $detail->disc }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control" name="jumlah[]" value="{{ $detail->jumlah }}">
                                </td>
                                <td>
                                    <input type="number" step="0.01" class="form-control" name="komisi[]" value="{{ $detail->komisi }}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-sm btn-success" onclick="addRow()">Tambah</button>
            </div>
        </div>

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

                cell1.innerHTML = "<input type='text' class='form-control' name='jenis_perawatan[]' required>";
                cell2.innerHTML = "<input type='number' step='0.01' class='form-control' name='harga_treatment[]' required>";
                cell3.innerHTML = "<input type='number' step='0.01' class='form-control' name='disc[]' >";
                cell4.innerHTML = "<input type='number' step='0.01' class='form-control' name='jumlah[]' required>";
                cell5.innerHTML = "<input type='number' step='0.01' class='form-control' name='komisi[]' >";
                cell6.innerHTML = "<button type='button' class='btn btn-sm btn-danger' onclick='deleteRow(this)'>Hapus</button>";
            }

            function deleteRow(r) {
                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("table-detail-transaksi").deleteRow(i);
            }
        </script>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection

