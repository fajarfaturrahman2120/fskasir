@extends('layouts.dashboard')
@section('title','Tambah Supplier')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-header fw-semibold">
            Tambah Supplier
        </div>

        <div class="card-body">

            <form action="{{ route('supplier.store', $toko->id_toko) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Supplier</label>
                    <input type="text"
                           name="nama_supplier"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text"
                           name="alamat"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text"
                           name="no_hp"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('supplier.index', $toko->id_toko) }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
