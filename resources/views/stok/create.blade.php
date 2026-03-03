@extends('layouts.dashboard')

@section('title', 'Tambah Data')

@section('content')

    <div class="container">

        <h4>Tambah Stok Produk {{ $produk->nama_produk }}</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('stok.store', $produk->id_produk) }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <label>Supplier</label>
                    <select name="id_supplier" class="form-control" required>
                        <option value="">-- Pilih Supplier --</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id_supplier }}">
                                {{ $supplier->nama_supplier }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Tanggal Input *</label>
                    <input type="date" name="tanggal_input" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Jumlah Stok *</label>
                    <input type="number" name="qty" id="qty" class="form-control" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Harga Total Beli Stok *</label>
                    <input type="number" name="harga_total" id="harga_total" class="form-control" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Harga Satu Beli Stok</label>
                    <input type="number" name="harga_satuan" id="harga_satuan" class="form-control">
                </div>

                <div class="col-md-6 mt-3">
                    <label>Status Bayar</label>
                    <select name="status_bayar" class="form-control">
                        <option value="lunas">Lunas</option>
                        <option value="hutang">Hutang</option>
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Pembayaran</label>
                    <select name="pembayaran" class="form-control">
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Tanggal Expired</label>
                    <input type="date" name="expired" class="form-control">
                </div>

                <div class="col-md-12 mt-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </form>

    </div>

    {{-- SCRIPT AUTO HITUNG --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let qtyInput = document.getElementById("qty");
            let totalInput = document.getElementById("harga_total");
            let satuanInput = document.getElementById("harga_satuan");

            // ambil harga jual produk dari database
            let hargaGrosir = {{ $produk->harga_grosir ?? 0 }};

            qtyInput.addEventListener("input", function() {
                let qty = parseInt(this.value) || 0;
                let total = qty * hargaGrosir;

                totalInput.value = total;
                satuanInput.value = hargaJual;
            });

        });
    </script>

@endsection
