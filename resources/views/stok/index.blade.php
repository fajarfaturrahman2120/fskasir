@extends('layouts.dashboard')
@section('title', 'Index Stok')

@section('content')

    <div class="container-fluid">
        <div class="mb-3">
            <h4>Toko Owner {{ $produk->toko->name ?? '-' }}</h4>

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
        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- HEADER --}}
        <div class="card shadow-sm mb-4">

            <div class="card-body">


                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-end">
                        <div class="text-muted">Total Stok</div>
                        <div class="fs-3 fw-bold text-primary">
                            {{ number_format($produk->jumlah_stok, 0, ',', '.') }}
                        </div>
                    </div>
                </div>

                {{-- MENU BUTTON --}}
                <div class="mt-4 d-flex gap-2 flex-wrap">

                    <a href="{{ route('stok.create', $produk->id_produk) }}" class="btn btn-success">
                        + Tambah Stok
                    </a>

                    <a href="{{ route('stok.kurang.form', $produk->id_produk) }}" class="btn btn-danger">
                        - Kurang Stok
                    </a>

                    <a href="{{ route('stok.kembali.form', $produk->id_produk) }}" class="btn btn-warning text-dark">
                        ↺ Kembalian Stok
                    </a>

                    <a href="{{ route('produk.index', $produk->toko->id_toko) }}" class="btn btn-secondary">
                        ← Kembali ke Produk
                    </a>

                </div>

            </div>
        </div>

        {{-- TABEL RIWAYAT --}}
        <div class="card shadow-sm">
            <div class="card-header bg-light fw-bold">
                Riwayat Stok {{ $produk->nama_produk }}
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">

                    <thead class="table-light text-center">
                        <tr>
                            <th class="text-start">Deskripsi</th>
                            <th width="15%">Qty</th>
                            <th width="15%">Total Sekarang</th>
                            <th width="15%">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayat as $item)
                            <tr>

                                {{-- DESKRIPSI --}}
                                <td>
                                    <div class="fw-semibold">
                                        {{ ucfirst($item->tipe) }} Stok
                                    </div>
                                    <small class="text-muted">
                                      {{ $item->supplier?->nama_supplier ?? 'Tanpa Supplier' }}
                                        • {{ \Carbon\Carbon::parse($item->tanggal_input)->format('d F Y') }}
                                    </small>
                                </td>

                                {{-- QTY --}}
                                <td class="text-center fw-bold">
                                    @if ($item->tipe === 'tambah')
                                        <span class="text-success">
                                            +{{ number_format($item->qty, 0, ',', '.') }}
                                        </span>
                                    @elseif ($item->tipe === 'kurang' || $item->tipe === 'kembali')
                                        <span class="text-danger">
                                            -{{ number_format($item->qty, 0, ',', '.') }}
                                        </span>
                                    @else
                                        <span class="text-secondary">
                                            {{ number_format($item->qty, 0, ',', '.') }}
                                        </span>
                                    @endif
                                </td>

                                {{-- SALDO --}}
                                <td class="text-center">
                                    {{ number_format($item->saldo, 0, ',', '.') }}
                                </td>

                                {{-- STATUS --}}
                                <td class="text-center">
                                    @if ($item->tipe === 'tambah')
                                        <span class="badge bg-success">Masuk</span>
                                    @elseif ($item->tipe === 'kurang')
                                        <span class="badge bg-danger">Keluar</span>
                                    @elseif ($item->tipe === 'kembali')
                                        <span class="badge bg-warning text-dark">Kembali</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
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
