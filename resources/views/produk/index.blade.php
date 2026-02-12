@extends('layouts.dashboard')

@section('title', 'Produk')
@section('content')
    <div class="container-fluid py-3">

        {{-- Header --}}
        <div class="mb-3">
            <h4 class="fw-bold">Toko Owner {{ $toko->name }}</h4>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Owner</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Toko</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </nav>
        </div>

        {{-- Action Buttons --}}
        <div class="d-flex gap-2 mb-3">
            <a class="btn btn-success" href="{{ route('produk.create') }}">+ Tambah Produk</a>
            <a class="btn btn-outline-primary" href="{{ route('kategori.index') }}">Kategori</a>
        </div>

        {{-- Filter --}}
        <div class="d-flex justify-content-between mb-3">
            <select class="form-select w-25">
                <option>Pilih Kategori</option>
            </select>

            <input type="text" class="form-control w-25" placeholder="Cari produk...">
        </div>

        {{-- Produk List --}}
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white text-center fw-bold">
                PRODUK
            </div>

            <div class="card-body p-0">
                @forelse ($produk as $item)
                    <div class="d-flex align-items-center border-bottom p-3">

                        {{-- Gambar --}}
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="rounded border me-3" width="100"
                            height="100" style="object-fit:cover;">

                        {{-- Info --}}
                        <div class="flex-grow-1">
                            <h5 class="mb-1 fw-semibold text-dark">{{ $item->nama_produk }}</h5>

                            <div class="mb-1">
                                <span class="fw-bold text-success">
                                    Rp {{ number_format($item->harga_jual) }}
                                </span>
                                <del class="text-muted ms-2">
                                    Rp {{ number_format($item->harga_pokok) }}
                                </del>
                            </div>

                            <span class="badge bg-secondary">
                                Stok: {{ $item->jumlah_stok }}
                            </span>
                        </div>


                        {{-- Tombol --}}
                        <div class="btn-group gap-1">
                            <a href="{{ route('produk.show', $item->id_produk) }}" class="btn btn-sm btn-outline-primary"
                                title="Detail">
                                👁
                            </a>

                            <a href="{{ route('produk.edit', $item->id_produk) }}" class="btn btn-sm btn-warning"
                                title="Edit">
                                ✏
                            </a>

                            <form action="{{ route('produk.destroy', $item->id_produk) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Hapus"
                                    onclick="return confirm('Hapus produk ini?')">
                                    🗑
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="p-3 text-center text-muted">
                        Produk belum ada.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

@endsection
