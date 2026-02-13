@extends('layouts.dashboard')

@section('title', 'Edit Toko')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Edit Toko</h4>

    <form action="{{ route('toko.update', $toko->id_toko) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Toko</label>
        <input type="text" name="name" class="form-control" value="{{ $toko->name }}" required><br>

        <label>No HP</label>
        <input type="number" name="no_hp" class="form-control" value="{{ $toko->no_hp }}" required><br>

        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah"><br>

        <label>Alamat Toko</label>
        <input type="text" name="alamat" class="form-control" value="{{ $toko->alamat }}" required><br>

        <label>Username</label>
        <input type="text" name="username" class="form-control" value="{{ $toko->username }}" required><br>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('toko.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
