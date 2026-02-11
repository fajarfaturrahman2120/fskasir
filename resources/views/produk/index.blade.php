@extends('layouts.dashboard')

@section('title', 'Produk')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    </head>

    <body>
        {{-- nama Toko --}}
        <div class="flex">
            <div class="main-content p-4">
                <div class="container-fluid">
                    <h3 class="fw-bold">Toko Owner   {{ $toko->name }}</h3>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Owner</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Toko</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            <li class="breadcrumb-item active" aria-current="page">Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        {{-- nama toko --}}
        {{-- content --}}

        <div class="container-fluid">

            {{-- Header --}}


            {{-- Tabs --}}
            <ul class="nav nav-pills mb-3">
                <li class="nav-item">
                    <a class="nav-link active bg-purple" href="{{route('produk.create')}}">Tambah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-light text-dark" href="{{route('kategori.index')}}">Kategori</a>
                </li>
            </ul>

            {{-- Filter --}}
            <div class="d-flex justify-content-between mb-3">
                <select class="form-select w-25">
                    <option>Pilih Kategori</option>
                </select>

                <input type="text" class="form-control w-25" placeholder="Search...">
            </div>

            {{-- Header Produk --}}
            <div class="bg-purple text-black text-center py-2 fw-bold">
                PRODUK
            </div>

            {{-- List Produk --}}
            <div class="bg-light p-3">
                @foreach ($produk as $item)
                    <div class="d-flex border-bottom py-3">

                        {{-- Gambar --}}
                        <img src="{{ asset('storage/' . $item->gambar) }}" width="120" class="me-3">

                        {{-- Info --}}
                        <div>
                            <h6 class="mb-1">{{ $item->nama_produk }}</h6>

                            <small class="text-muted">
                                Harga Diskon Rp {{ number_format($item->harga_jual) }}
                                <del class="text-danger">
                                    {{ number_format($item->harga_pokok) }}
                                </del>
                            </small>

                            <p class="mb-1">
                                Stok: {{ $item->jumlah_stok  }}
                            </p>

                            {{-- Tombol --}}
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-purple">👁</a>
                                <a href="#" class="btn btn-sm btn-warning">✏</a>
                                <a href="#" class="btn btn-sm btn-dark">🗑</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>


        {{-- content --}}

        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
