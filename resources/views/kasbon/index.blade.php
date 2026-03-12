@extends('layouts.dashboard')

@section('title', 'Index Kasbon')

@section('content')

    <div class="mb-4">
        <h5 class="fw-semibold mb-1">
            Toko Owner {{ $toko->name ?? '-' }}
        </h5>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small mb-0">
                <li class="breadcrumb-item"><a href="#">Owner</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Toko</a></li>
                <li class="breadcrumb-item active">Detail</li>
                <li class="breadcrumb-item active">Kasbon</li>
            </ol>
        </nav>
    </div>

    {{-- Total Kasbon --}}
    <div class="mb-3">
        <label class="fw-bold">Total Kasbon</label>
        <input type="text" class="form-control" value="Rp {{ number_format($kasbon->sum('jumlah_kasbon'), 0, ',', '.') }}"
            readonly>
    </div>

    <div class="card shadow-sm">

        <div class="card-header text-center fw-bold bg-info-subtle">
            DATA KASBON
        </div>

        <div class="card-body p-0">

            <table class="table table-borderless align-middle mb-0">
                <tbody>
                    @forelse($kasbon as $item)
                        <tr class="border-bottom">
                            <td class="ps-4 fw-semibold">
                                {{ $item->nama_pengkasbon }}
                            </td>
                            <td>
                                {{ $item->pembayaran_kasbon }}
                            </td>
                            <td>
                                {{ $item->tanggal_kasbon }}
                            </td>
                            <td>
                                Rp {{ number_format($item->jumlah_kasbon, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ $item->cicilan }}
                            </td>
                            <td class="text-end pe-4">
                                {{-- Whatsapp --}}
                                {{-- <a href="https://wa.me/{{ $item->no_hp_pengkasbon ?? '' }}"
                           target="_blank"
                           class="btn btn-success btn-sm">
                            WA
                        </a> --}}

                                {{-- Edit --}}
                                <a href="{{ route('kasbon.edit', [$id_toko, $item->id_kasbon]) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('kasbon.destroy', [$id_toko, $item->id_kasbon]) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Data Kasbon belum tersedia
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
