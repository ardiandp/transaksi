@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>
<div class="container">
    <h2>Buat Perawatan Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('master.perawatanstore') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Perawatan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
</div>

        <div class="form-group">
            <label for="durasi">Durasi (Menit)</label>
            <input type="number" class="form-control" id="durasi" name="durasi">
        </div>

        <div class="form-group">
            <label for="harga">Harga (Rp)</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perawatan</button>
    </form>
</div>
@endsection

@section('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        // Mengaktifkan CKEditor pada textarea dengan id 'deskripsi'
        CKEDITOR.replace('deskripsi');
    </script>
@endsection

