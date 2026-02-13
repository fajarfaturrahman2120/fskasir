@extends('layouts.dashboard')
@section('title', 'Tambah Data')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <div class="card-body">
        <h3 class="text-center">Tambah Kategori</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kategori.store', ['id_toko' => $toko->id_toko]) }}" method="post">
            @csrf

            <input type="hidden" name="id_toko" value="{{ $toko->id_toko }}">

            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>

            <label>Jenis Transaksi</label>
            <input type="text" name="jenis_transaksi" class="form-control" required>

            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('kategori.index', ['id_toko' => $toko->id_toko]) }}" class="btn btn-dark">Cancel</a>
        </form>

    </div>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@endsection
