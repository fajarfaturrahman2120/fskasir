@extends('layouts.dashboard')
@section('title', 'Form Kurang')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h5>Form Pengurangan Stok {{ $produk->nama_produk }}</h5>
        </div>
        <div class="card-body">

            <form action="{{ route('stok.kurang.store', $produk->id_produk) }}" method="POST">
                @csrf

                {{-- Hidden harga jual dari database --}}
                <input type="hidden" id="harga_jual" value="{{ $produk->harga_jual }}">

                <div class="row">

                    <div class="col-md-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal_input" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Harga Total</label>
                        <input type="number"
                               class="form-control"
                               name="harga_total"
                               id="harga_total"
                               readonly>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Jumlah Stok</label>
                        <input type="number"
                               class="form-control"
                               name="qty"
                               id="qty"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text"
                               class="form-control"
                               name="keterangan">
                    </div>

                </div>

                <br>

                <button type="submit" class="btn btn-danger">
                    Simpan
                </button>

                <a href="{{ route('stok.index', $produk->id_produk) }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>
</div>

{{-- SCRIPT HARUS DI DALAM SECTION --}}
<script>
document.addEventListener("DOMContentLoaded", function () {

    const qtyInput = document.getElementById('qty');
    const hargaTotalInput = document.getElementById('harga_total');
    const hargaJual = parseFloat(document.getElementById('harga_jual').value) || 0;

    qtyInput.addEventListener('input', function () {
        let qty = parseFloat(this.value) || 0;
        let total = qty * hargaJual;
        hargaTotalInput.value = total;
    });

});
</script>

@endsection
