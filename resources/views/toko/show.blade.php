@extends('layouts.dashboard')

@section('title', 'Detail Toko')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Detail Toko</h4>

    <div class="card p-4 shadow-sm">
        <p><strong>Nama Toko:</strong> {{ $toko->name }}</p>
        <p><strong>No HP:</strong> {{ $toko->no_hp }}</p>
        <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
        <p><strong>Username:</strong> {{ $toko->username }}</p>

        <a href="{{ route('toko.edit', $toko->id_toko) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('toko.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
