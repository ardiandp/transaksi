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
                
                    <div class="card-header">
                        <h2 class="d-inline-block">Daftar Gerai</h2><button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Tambah Gerai</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Gerai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('master.geraistore') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kode">Kode</label>
                                                <input type="text" class="form-control" id="kode" name="kode" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_gerai">Nama Gerai</label>
                                                <input type="text" class="form-control" id="nama_gerai" name="nama_gerai" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="aktif" selected>Aktif</option>
                                                    <option value="tidak_aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Kode</th>
                <th>Nama Gerai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gerai as $g)
                <tr>
                    <td>{{ $g->kode }}</td>
                    <td>{{ $g->nama_gerai }}</td>
                    <td>{{ ucfirst($g->status) }}</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{ $g->id }}">Hapus</a>
                        <div class="modal fade" id="hapusModal{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel">Hapus Gerai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('master.geraidestroy', $g->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <p>Anda yakin ingin menghapus gerai ini?</p>
                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $g->id }}">Edit</a>
                        <div class="modal fade" id="editModal{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Gerai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('master.geraiupdate', $g->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="kode">Kode</label>
                                                <input type="text" class="form-control" id="kode" name="kode" value="{{ $g->kode }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_gerai">Nama Gerai</label>
                                                <input type="text" class="form-control" id="nama_gerai" name="nama_gerai" value="{{ $g->nama_gerai }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="aktif" {{ $g->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="tidak_aktif" {{ $g->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
                </div>
           
        </div>
    </div>

@endsection

