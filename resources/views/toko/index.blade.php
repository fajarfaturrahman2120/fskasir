@extends('layouts.dashboard')

@section('title', 'Kelola Toko')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h4 class="fw-bold mb-1">Toko Owner {{ Auth::user()->name }}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Owner</a></li>
                        <li class="breadcrumb-item active">Toko</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('toko.create') }}" class="btn btn-success shadow-sm rounded-3 px-3">
                <i class="bi bi-plus-lg me-1"></i> Tambah Toko
            </a>
        </div>

        <div class="row g-4">
            @foreach ($toko as $item)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                    <i class="bi bi-shop fs-3 text-primary"></i>
                                </div>

                                <div class="dropdown">
                                    <button class="btn btn-link text-muted p-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical fs-5"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">

                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('toko.show', $item->id_toko) }}">
                                                <i class="bi bi-eye me-2 text-info"></i> Detail Toko
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item py-2" href="{{ route('toko.edit', $item->id_toko) }}">
                                                <i class="bi bi-pencil me-2 text-warning"></i> Edit Toko
                                            </a>
                                        </li>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li>
                                            <form action="{{ route('toko.destroy', $item->id_toko) }}" method="POST"
                                                onsubmit="return confirm('Hapus toko ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item py-2 text-danger">
                                                    <i class="bi bi-trash me-2"></i> Hapus
                                                </button>
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mb-1">Toko {{ $item->name }}</h5>


                            <div class="d-grid">
                                <a href="{{ route('menu.index', $item->id_toko) }}"
                                    class="btn btn-outline-primary fw-semibold rounded-3 py-2">
                                    Lihat Toko
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        /* Hover effect agar kartu terasa interaktif */
        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
@endsection

