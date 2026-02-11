@extends('layouts.dashboard')

@section('title', 'Edit Produk')

@section('content')
<div class="container">

    <h4 class="mb-4">Edit Produk</h4>

    <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <label>Nama Produk *</label>
                <input type="text" name="nama_produk" class="form-control mb-3"
                       value="{{ $produk->nama_produk }}" required>

                <label>Kategori *</label>
                <select name="id_kategori" class="form-control mb-3" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}"
                            {{ $produk->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                            {{ $k->kategori }}
                        </option>
                    @endforeach
                </select>

                <label>Harga Pokok *</label>
                <input type="number" name="harga_pokok" class="form-control mb-3"
                       value="{{ $produk->harga_pokok }}" required>

                <label>Harga Jual *</label>
                <input type="number" name="harga_jual" class="form-control mb-3"
                       value="{{ $produk->harga_jual }}" required>

                <label>Harga Diskon</label>
                <input type="number" name="harga_diskon" class="form-control mb-3"
                       value="{{ $produk->harga_diskon }}">

                <label>Aktifkan Harga Diskon</label>
                <select name="is_diskon" class="form-control mb-3">
                    <option value="tidak" {{ $produk->is_diskon == 'tidak' ? 'selected' : '' }}>Tidak</option>
                    <option value="ya" {{ $produk->is_diskon == 'ya' ? 'selected' : '' }}>Ya</option>
                </select>

                <label>Harga Grosir</label>
                <input type="number" name="harga_grosir" class="form-control mb-3"
                       value="{{ $produk->harga_grosir }}">

                <label>Minimal Beli Grosir</label>
                <input type="number" name="min_grosir" class="form-control mb-3"
                       value="{{ $produk->min_grosir }}">

                <label>Dijual</label>
                <select name="dijual" class="form-control mb-3">
                    <option value="dijual" {{ $produk->dijual == 'dijual' ? 'selected' : '' }}>Dijual</option>
                    <option value="tidak" {{ $produk->dijual == 'tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Kode Produk</label>
                <input type="text" name="kode_produk" class="form-control mb-3"
                       value="{{ $produk->kode_produk }}">

                <label>Pengaturan Stok *</label>
                <select name="pengaturan_stok" class="form-control mb-3" required>
                    <option value="tanpa stok" {{ $produk->pengaturan_stok == 'tanpa stok' ? 'selected' : '' }}>Tanpa Stok</option>
                    <option value="pakai stok" {{ $produk->pengaturan_stok == 'pakai stok' ? 'selected' : '' }}>Pakai Stok</option>
                </select>

                <label>Pengaturan Harga Stok</label>
                <select name="pengaturan_harga_stok" class="form-control mb-3">
                    <option value="manual" {{ $produk->pengaturan_harga_stok == 'manual' ? 'selected' : '' }}>Manual</option>
                    <option value="otomatis" {{ $produk->pengaturan_harga_stok == 'otomatis' ? 'selected' : '' }}>Otomatis</option>
                </select>

                <label>Pengaturan Harga Jual</label>
                <select name="pengaturan_harga_jual" class="form-control mb-3">
                    <option value="jual" {{ $produk->pengaturan_harga_jual == 'jual' ? 'selected' : '' }}>Jual</option>
                    <option value="margin" {{ $produk->pengaturan_harga_jual == 'margin' ? 'selected' : '' }}>Margin</option>
                </select>

                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control mb-3"
                       value="{{ $produk->satuan }}">

                <label>Berat (gram)</label>
                <input type="number" name="berat" class="form-control mb-3"
                       value="{{ $produk->berat }}">

                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control mb-3"
                       value="{{ $produk->lokasi }}">

                <label>Deskripsi Produk</label>
                <input type="text" name="deskripsi_produk" class="form-control mb-3"
                       value="{{ $produk->deskripsi_produk }}">

                <label>Gambar Produk</label>
                <input type="file" name="gambar" class="form-control mb-2">

                @if($produk->gambar)
                    <img src="{{ asset('storage/'.$produk->gambar) }}" width="120">
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3">Cancel</a>

    </form>
</div>
@endsection
