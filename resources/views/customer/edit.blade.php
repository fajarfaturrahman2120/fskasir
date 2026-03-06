@extends('layouts.dashboard')

@section('title', 'Edit Member')

@section('content')

    <div class="container-fluid">

        <div class="mb-3">
            <h4 class="fw-bold">Edit Member - {{ $toko->name }}</h4>
        </div>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('customer.update', [$id_toko, $customer->id_customer]) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Customer</label>
                        <input type="text" name="nama_customer" value="{{ $customer->nama_customer }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No HP</label>
                        <input type="number" name="no_hp" value="{{ $customer->no_hp }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Point</label>
                        <input type="number" name="point" value="{{ $customer->point }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control">{{ $customer->alamat }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan_customer" class="form-control">{{ $customer->keterangan_customer }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        Update Member
                    </button>

                    <a href="{{ route('customer.index', $id_toko) }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>

@endsection
