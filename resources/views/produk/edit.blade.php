


    <div class="container">
        <h1>Edit Produk</h1>
        <form action="{{ route('produk.update', ['produk' => $produk->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" id="kode" class="form-control" value="{{ $produk->kode }}">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $produk->nama }}">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $produk->harga }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
