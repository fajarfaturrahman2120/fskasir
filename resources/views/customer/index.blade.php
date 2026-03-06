@extends('layouts.dashboard')

@section('title', 'Index Member')

@section('content')
    <div class="container-fluid">

        <div class="mb-3">
            <h4 class="fw-bold">Toko Owner {{ $toko->name }}</h4>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Owner</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Toko</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                    <li class="breadcrumb-item active">Member</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('customer.create', $toko->id_toko) }}" class="btn btn-primary mb-3">
            Tambah Member
        </a>
        <div class="card">
            <div class="card-body p-0">

                <table class="table align-middle mb-0">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light fw-bold text-center">
                            Pelanggan
                        </div>

                        <tbody>

                            @forelse($customer as $item)
                                <tr>

                                    <td>
                                        <div class="fw-bold">{{ $item->nama_customer }}</div>

                                        {{-- <div class="text-muted">
                                            {{ $item->no_hp }}
                                        </div> --}}

                                        <div class="mt-1">
                                            {{ number_format($item->point) }} Point
                                        </div>

                                        <div class="text-muted">
                                            {{ $item->alamat }}
                                        </div>
                                    </td>

                                    <td class="text-end">

                                        <div class="d-flex gap-1 justify-content-end">

                                            <a href="https://wa.me/{{ $item->no_hp }}" target="_blank"
                                                class="btn btn-success btn-sm">
                                                <i class="bi bi-whatsapp"></i>
                                            </a>

                                            <a href="{{ route('customer.edit', [$toko->id_toko, $item->id_customer]) }}"
                                                class="btn btn-warning btn-sm">
                                              <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form
                                                action="{{ route('customer.destroy', [$toko->id_toko, $item->id_customer]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus customer ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-4">
                                        Data customer belum tersedia
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
