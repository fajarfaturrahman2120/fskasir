@extends('layouts.dashboard')
@section('title','Edit Supplier')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm border-0">
        <div class="card-header fw-semibold">
            Edit Supplier
        </div>

        <div class="card-body">

            <form action="{{ route('supplier.update', [$toko->id_toko, $supplier->id_supplier]) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Supplier</label>
                    <input type="text"
                           name="nama_supplier"
                           value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text"
                           name="alamat"
                           value="{{ old('alamat', $supplier->alamat) }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text"
                           name="no_hp"
                           value="{{ old('no_hp', $supplier->no_hp) }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control"
                              rows="3">{{ old('keterangan', $supplier->keterangan) }}</textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Update
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
