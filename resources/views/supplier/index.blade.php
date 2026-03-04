@extends('layouts.dashboard')
@section('title', 'Index Supplier')

@section('content')

    <div class="container-fluid">

        {{-- Header --}}
        <div class="mb-4">
            <h5 class="fw-semibold mb-1">
                Toko Owner {{ $toko->name ?? '-' }}
            </h5>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item"><a href="#">Owner</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Toko</a>
                    </li>
                    <li class="breadcrumb-item active">Detail</li>
                    <li class="breadcrumb-item active">Produk</li>
                    <li class="breadcrumb-item active">Supplier</li>
                </ol>
            </nav>
        </div>

        {{-- Tombol Tambah --}}
        <div class="mb-3">
            <a href="{{ route('supplier.create', $id_toko) }}" class="btn btn-primary">
                + Tambah Supplier
            </a>
        </div>

        {{-- Card --}}
        <div class="card shadow-sm border-0">

            <div class="card-header text-center fw-bold bg-info-subtle">
                SUPPLIER
            </div>

            <div class="card-body p-0">

                <table class="table table-borderless align-middle mb-0">
                    <tbody>

                        @forelse($suppliers as $supplier)
                            <tr class="bg-light border-bottom">

                                {{-- Nama Supplier --}}
                                <td class="ps-4 py-3">
                                    {{ $supplier->nama_supplier }}
                                </td>

                                {{-- Tombol Aksi --}}
                                <td class="text-end pe-4">


                                    <a href="https://wa.me/{{ $supplier->no_hp }}" target="_blank"
                                        class="btn btn-success btn-sm">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>


                                    <a href="{{ route('stok.index', [$id_toko, $supplier->id_supplier]) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="bi bi-floppy"></i>
                                    </a>


                                    <a href="{{ route('supplier.edit', [$id_toko, $supplier->id_supplier]) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>


                                    <form action="{{ route('supplier.destroy', [$id_toko, $supplier->id_supplier]) }}"
                                        method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center py-4">
                                    Data supplier belum tersedia
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

            {{-- Pagination --}}
            <div class="card-footer bg-white">
                {{ $suppliers->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

@endsection
