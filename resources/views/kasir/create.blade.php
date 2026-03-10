@extends('layouts.dashboard')
@section('title','Tambah Kasir')

@section('content')

<div class="container mt-4">

    {{-- Judul --}}
    <div class="mb-4">
        <h4 class="fw-bold">Tambah Kasir</h4>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('kasir.store', $id_toko) }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Kasir</label>
                        <input type="text" name="nama_kasir" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik_kasir" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp_kasir" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat_kasir" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('kasir.index', $id_toko) }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
