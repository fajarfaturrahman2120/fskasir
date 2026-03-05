@extends('layouts.dashboard')

@section('title','Tambah Member')

@section('content')

<div class="container-fluid">

<div class="mb-3">
<h4 class="fw-bold">Tambah Member - {{ $toko->name }}</h4>
</div>

<div class="card">
<div class="card-body">

<form action="{{ route('customer.store',$id_toko) }}" method="POST">

@csrf

<div class="mb-3">
<label class="form-label">Nama Customer</label>
<input type="text" name="nama_customer" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">No HP</label>
<input type="number" name="no_hp" class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Point</label>
<input type="number" name="point" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Alamat</label>
<textarea name="alamat" class="form-control"></textarea>
</div>

<div class="mb-3">
<label class="form-label">Keterangan</label>
<textarea name="keterangan_customer" class="form-control"></textarea>
</div>

<button class="btn btn-primary">
Simpan Member
</button>

<a href="{{ route('customer.index',$id_toko) }}" class="btn btn-secondary">
Kembali
</a>

</form>

</div>
</div>

</div>

@endsection
