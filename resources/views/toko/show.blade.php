@extends('layouts.dashboard')

@section('title', 'Detail Toko')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Detail Toko</h4>

    <div class="card p-4 shadow-sm">
        <div class="row">
            <!-- KIRI -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Nama Toko</label>
                    <input type="text" class="form-control bg-light" value="{{ $toko->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text" class="form-control bg-light" value="{{ $toko->no_hp }}" readonly>
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text" class="form-control bg-light" value="{{ $toko->alamat }}" readonly>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control bg-light" value="{{ $toko->username }}" readonly>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
