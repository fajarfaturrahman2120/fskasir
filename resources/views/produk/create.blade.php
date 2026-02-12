@extends('layouts.dashboard')

@section('title', 'Tambah Produk')

@section('content')
    <div class="container">

        <h4 class="mb-4">Tambah Produk</h4>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <label>Nama Produk *</label>
                    <input type="text" name="nama_produk" class="form-control mb-3" required>

                    <label>Kategori *</label>
                    <select name="id_kategori" class="form-control mb-3" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id_kategori }}">
                                {{ $k->kategori }}
                            </option>
                        @endforeach
                    </select>

                    <label>Harga Pokok *</label>
                    <input type="number" name="harga_pokok" class="form-control mb-3" required>

                    <label>Harga Jual *</label>
                    <input type="number" name="harga_jual" class="form-control mb-3" required>

                    <label>Harga Diskon</label>
                    <input type="number" name="harga_diskon" class="form-control mb-3">

                    <label>Aktifkan Harga Diskon</label>
                    <select name="is_diskon" class="form-control mb-3">
                        <option value="tidak">Tidak</option>
                        <option value="ya">Ya</option>
                    </select>

                    <label>Harga Grosir</label>
                    <input type="number" name="harga_grosir" class="form-control mb-3">

                    <label>Minimal Beli Grosir</label>
                    <input type="number" name="min_grosir" class="form-control mb-3">
                    <label>Dijual</label>
                    <select name="dijual" class="form-control mb-3">
                        <option value="dijual">Dijual</option>
                        <option value="tidak">Tidak</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Kode Produk</label>
                    <input type="text" name="kode_produk" class="form-control mb-3">

                    <label>Pengaturan Stok *</label>
                    <select name="pengaturan_stok" id="pengaturan_stok" class="form-control mb-3" required>
                        <option value="tanpa stok">Tanpa Stok</option>
                        <option value="pakai stok">Pakai Stok</option>
                    </select>

                    <div id="stok-wrapper" style="display:none;">
                        <label>Jumlah Stok *</label>
                        <input type="number" name="jumlah_stok" class="form-control mb-3">
                    </div>


                    <label>Pengaturan Harga Stok</label>
                    <select name="pengaturan_harga_stok" class="form-control mb-3">
                        <option value="manual">Manual</option>
                        <option value="otomatis">Otomatis</option>
                    </select>

                    <label>Pengaturan Harga Jual</label>
                    <select name="pengaturan_harga_jual" class="form-control mb-3">
                        <option value="jual">Jual</option>
                        <option value="margin">Margin</option>
                    </select>

                    <label>Satuan</label>
                    <input type="text" name="satuan" class="form-control mb-3">

                    <label>Berat (gram)</label>
                    <input type="number" name="berat" class="form-control mb-3">

                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control mb-3">

                    <label>Deskripsi Produk</label>
                    <input type="text" name="deskripsi_produk" class="form-control mb-3">

                    <label>Gambar Produk</label>
                    <input type="file" name="gambar" class="form-control mb-3">


                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Cancel</a>

        </form>
    </div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    const stokSelect = document.getElementById('pengaturan_stok');
    const stokWrapper = document.getElementById('stok-wrapper');

    stokSelect.addEventListener('change', function () {
        if (this.value === 'pakai stok') {
            stokWrapper.style.display = 'block';
        } else {
            stokWrapper.style.display = 'none';
        }
    });
});
</script>
