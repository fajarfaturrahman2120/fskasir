@extends('layouts.dashboard')
@section('title','Edit Kasir')

@section('content')

<div class="container mt-4">

    <div class="mb-4">
        <h4 class="fw-bold">Edit Kasir</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('kasir.update', [$id_toko,$kasir->id_kasir]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Kasir</label>
                        <input type="text" name="nama_kasir"
                               class="form-control"
                               value="{{ $kasir->nama_kasir }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik_kasir"
                               class="form-control"
                               value="{{ $kasir->nik_kasir }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">No HP</label>
                        <input type="text" name="no_hp_kasir"
                               class="form-control"
                               value="{{ $kasir->no_hp_kasir }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat_kasir"
                               class="form-control"
                               value="{{ $kasir->alamat_kasir }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan"
                               class="form-control"
                               value="{{ $kasir->keterangan }}">
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                    <a href="{{ route('kasir.index',$id_toko) }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
