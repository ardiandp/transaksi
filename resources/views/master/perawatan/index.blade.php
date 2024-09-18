@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>
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

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Data Perawatan</h2>
        <a href="{{ route('master.perawatancreate') }}" class="btn btn-primary">Tambah Perawatan</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Durasi (Menit)</th>
                <th>Harga (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perawatan as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                    <td>{{ $p->durasi ?? 'Tidak ada durasi' }}</td>
                    <td>{{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('master.perawatanedit', $p->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('master.perawatandestroy', $p->id) }}" method="POST" class="d-inline">
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
@endsection
