@extends('layouts.dashboard')

@section('title', 'Index Stok')

@section('content')
  <div class="mb-3">
            <h4 class="fw-bold">Toko Owner {{ $toko->name }}</h4>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Owner</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Toko</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                    <li class="breadcrumb-item active">Produk</li>
                    <li class="breadcrumb-item active">Stok</li>
                </ol>
            </nav>
        </div>
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fw-bold mb-0">
                Stok Produk
            </h5>
            <small class="text-muted">
                {{  $produk->nama }}
            </small>
        </div>

        <div class="text-end">
            <div class="fs-4 fw-bold text-primary">
                {{ number_format($produk->stok,0,',','.') }}
            </div>
            <small class="text-muted">Total Stok Saat Ini</small>
        </div>
    </div>

    {{-- MENU AKSI --}}
    <div class="card shadow-sm mb-3">
        <div class="card-body py-2">


                <a href="#" class="btn btn-success w-25">
                    + Penambahan Stok
                </a>
                <a href="#" class="btn btn-danger w-25">
                    - Pengurangan Stok
                </a>
                <a href="#" class="btn btn-secondary w-25">
                    ↩Kembalian Stok
                </a>


        </div>
    </div>

    {{-- RIWAYAT --}}
    <div class="card shadow-sm">
        <div class="card-header bg-light fw-semibold">
            Riwayat Pergerakan Stok
        </div>

        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">

                {{-- <thead class="table-light text-center">
                    <tr>
                        <th class="text-start ps-4">Deskripsi</th>
                        <th width="15%">Qty</th>
                        <th width="15%">Saldo</th>
                        <th width="15%" class="text-end pe-4">Aksi</th>
                    </tr>
                </thead> --}}

                <tbody>

                    @forelse($riwayat as $item)
                    <tr>

                        {{-- DESKRIPSI --}}
                        <td class="ps-4 py-3">
                            <div class="fw-semibold">
                                {{ ucfirst($item->tipe) }} Stok
                            </div>

                            <small class="text-muted">
                                {{ $item->keterangan ?? 'Tanpa Supplier' }}
                                • {{ $item->created_at->format('d F Y') }}
                            </small>
                        </td>

                        {{-- QTY --}}
                        <td class="text-center fw-bold fs-5">
                            @if($item->tipe == 'tambah')
                                <span class="text-success">
                                    +{{ number_format($item->qty,0,',','.') }}
                                </span>
                            @else
                                <span class="text-danger">
                                    -{{ number_format($item->qty,0,',','.') }}
                                </span>
                            @endif
                        </td>

                        {{-- SALDO --}}
                        <td class="text-center fw-semibold">
                            {{ number_format($produk->stok,0,',','.') }}
                        </td>

                        {{-- AKSI --}}
                        <td class="text-end pe-4">

                            <span class="badge bg-success mb-2">
                                Lunas
                            </span>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="#" class="btn btn-sm btn-outline-primary">
                                    👁
                                </a>

                                <button class="btn btn-sm btn-outline-danger">
                                    🗑
                                </button>
                            </div>

                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">
                            Belum ada riwayat stok
                        </td>
                    </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
