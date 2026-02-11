@extends('layouts.dashboard')
@section('title', 'Edit Kategori')

@section('content')
<div class="card-body">
    <h3 class="text-center">Edit Kategori</h3>

    <form action="{{ route('kategori.update', $kategori->id_kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control"
               value="{{ $kategori->kategori }}" required>

        <label>Jenis Transaksi</label>
        <input type="text" name="jenis_transaksi" class="form-control"
               value="{{ $kategori->jenis_transaksi }}" required>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mt-2">Cancel</a>
    </form>
</div>
@endsection
