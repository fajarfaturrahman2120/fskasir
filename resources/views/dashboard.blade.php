@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <h3 class="fw-bold">Toko {{ Auth::user()->name }}</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Owner</a></li>
        <li class="breadcrumb-item">Toko</li>

    </ol>
    <a href="{{ route('toko.create') }}" class="btn btn-primary mb-3">Tambah Toko</a>

    <div class="card border-0 shadow-sm p-4 mt-4" style="max-width: 250px;">
        <div class="d-flex align-items-center">
            <div class="p-3 bg-light rounded me-3 text-primary">
                <i class="bi bi-shop fs-1"></i>
            </div>
            <div>
                <h5 class="mb-1 fw-bold">{{ Auth::user()->name }}</h5>
                <a href="{{ route('menu.index') }}" class="btn btn-sm btn-outline-primary">
                    Lihat Toko
                </a>
            </div>
        </div>
    </div>
@endsection
