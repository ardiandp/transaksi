
@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Transaksi
                        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary float-right">Tambah Transaksi</a>
                    </div>

                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        @if(session('success'))
                            swal({
                                title: "{{ session('success') }}",
                                text: "Data berhasil dihapus",
                                icon: "success",
                                button: "Ok",
                            });
                        @endif
                    </script>
                    <div class="card-body">                       
                        <table id="transaksi-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>                                   
                                    <th>No Invoice</th>
                                    <th>Nama Customer</th>
                                    <th>Jenis Perawatan</th>
                                    <th>Harga Treatment</th>                                  
                                    <th>Terapist</th>                       
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaksi->tanggal }}</td>                                       
                                        <td>{{ $transaksi->no_invoice }}</td>
                                        <td>{{ $transaksi->nama_customer }}</td>
                                        <td>{{ $transaksi->jenis_perawatan }}</td>
                                        <td>Rp {{ number_format($transaksi->harga_treatment, 2) }}</td>                                       
                                        <td>{{ $transaksi->terapist }}</td>                     
                                        <td>
                                            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                            
                                        </td>
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


