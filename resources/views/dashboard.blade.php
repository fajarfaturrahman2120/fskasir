    @extends('layouts.dashboard')

    @section('title', 'Dashboard')

    @section('content')
        <div>
            <div>
                <h4 class="fw-bold mb-1">
                    Toko Owner {{ Auth::user()->name }}
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Owner</li>
                        <li class="breadcrumb-item">Toko</li>

                    </ol>
                </nav>
            </div>
        </div>
        <a href="{{ route('toko.create') }}" class="btn btn-success mt-3">
            + Tambah Toko
        </a>
        <div class="container mt-4">
            <div class="row g-4">

                @foreach ($toko as $item)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="fw-bold mb-0">Toko {{ $item->name }}</h6>
                                        <small class="text-muted">{{ $item->name }}</small>
                                    </div>

                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">⋮</button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('toko.edit', $item->id_toko) }}">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('toko.destroy', $item->id_toko) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mt-4">
                                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                                        <i class="bi bi-shop fs-4 text-primary"></i>
                                    </div>

                                    <a href="{{ route('menu.index', $item->id_toko) }}" class="btn btn-primary">
                                        Lihat Toko
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    @endsection
