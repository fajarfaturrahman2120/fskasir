@extends('layouts.dashboard')

@section('title', 'Detail Produk')

@section('content')
    <div class="container">

        <h4 class="mb-4">Detail Produk</h4>

        <div class="card shadow-sm p-4">

            <div class="row g-3">

                {{-- KIRI --}}
                <div class="col-md-6">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->nama_produk }}" readonly>

                    <label class="mt-2">Harga Pokok</label>
                    <input type="text" class="form-control bg-light" value="Rp {{ number_format($produk->harga_pokok) }}"
                        readonly>

                    <label class="mt-2">Harga Diskon</label>
                    <input type="text" class="form-control bg-light"
                        value="Rp {{ number_format($produk->harga_diskon) }}" readonly>

                    <label class="mt-2">Harga Grosir</label>
                    <input type="text" class="form-control bg-light"
                        value="Rp {{ number_format($produk->harga_grosir) }}" readonly>

                    <label class="mt-2">Kode Produk</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->kode_produk }}" readonly>

                    <label class="mt-2">Pengaturan Harga Jual</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->pengaturan_harga_jual }}"
                        readonly>

                    <label class="mt-2">Satuan</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->satuan }}" readonly>

                    <label class="mt-2">Deskripsi Produk</label>
                    <input type="text" class="form-control bg-light"
                        value="{{ Str::limit($produk->deskripsi_produk, 100) }}" readonly>

                    <label class="mt-2">Dijual</label>
                    <input type="text" class="form-control bg-light" value="{{ ucfirst($produk->dijual) }}" readonly>
                </div>

                {{-- KANAN --}}
                <div class="col-md-6">
                    <label>Kategori</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->kategori->kategori ?? '-' }}"
                        readonly>

                    <label class="mt-2">Harga Jual</label>
                    <input type="text" class="form-control bg-light" value="Rp {{ number_format($produk->harga_jual) }}"
                        readonly>

                    <label class="mt-2">Aktifkan Harga Diskon</label>
                    <input type="text" class="form-control bg-light" value="{{ ucfirst($produk->is_diskon) }}" readonly>

                    <label class="mt-2">Minimal Beli Grosir</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->min_grosir }}" readonly>

                    <label class="mt-2">Pengaturan Stok</label>
                    <input type="text" class="form-control bg-light" value="{{ ucfirst($produk->pengaturan_stok) }}"
                        readonly>

                    <label class="mt-2">Berat (gram)</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->berat }}" readonly>

                    <label class="mt-2">Lokasi</label>
                    <input type="text" class="form-control bg-light" value="{{ $produk->lokasi }}" readonly>

                    <label class="mt-2">Foto</label>
                    <div class="border rounded bg-light text-center p-3">
                        @if ($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" style="max-width:150px;">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="mt-4 text-end">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Cancel</a>
            </div>

        </div>

    </div>
@endsection
