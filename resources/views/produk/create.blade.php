


    <div class="container">
        <h1>Tambah Produk Baru</h1>
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" id="kode" class="form-control" value="{{ old('kode') }}">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga') }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
