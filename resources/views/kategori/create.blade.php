@extends('layouts.dashboard')
@section('title', 'Tambah Data')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <div class="card-body">
        <h3 class="text-center">Tambah Kategori</h3>
            <form action="{{route('kategori.store')}}" method="post">
            @csrf
                <label for="">Kategori</label>
                <input type="text" name="kategori" class="form-control" required>
                <label for="">Jenis Transaksi</label>
                <input type="text" name="jenis_transaksi" class="form-control" required>
                <button type="submit" class="btn btn-success"> Submit</button>
                <a href="{{route('kategori.index')}} " class="btn btn-dark">Cancel</a>
            </form>
    </div>
<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@endsection
