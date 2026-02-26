@extends('layouts.dashboard')
@section('title', 'Form Kembali Stok')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Form Kembali Stok - {{ $produk->nama_produk }}</h5>
            </div>
            <div class="card-body">

                <form action="{{ route('stok.kembali.store', $produk->id_produk) }}" method="POST">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Supplier</label>
                            <input type="text" name="supplier" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Jumlah Stok</label>
                            <input type="number" name="jumlah_stok" id="jumlah_stok" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Status Bayar</label>
                            <select name="status_bayar" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="lunas">Lunas</option>
                                <option value="hutang">Hutang</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tanggal Input</label>
                            <input type="date" name="tanggal_input" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Harga Total Kembalikan Stok</label>
                            <input type="number" name="harga_total" id="harga_total" class="form-control" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Pembayaran</label>
                            <select name="pembayaran" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Cash">Cash</option>
                                <option value="TF">Transfer</option>
                            </select>
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('stok.index', $produk->id_produk) }}" class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                    {{-- Hidden harga beli --}}
                    <input type="hidden" name="harga_jual" id="harga_jual" value="{{ $produk->harga_jual }}">

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const jumlahInput = document.getElementById("jumlah_stok");
    const hargaTotalInput = document.getElementById("harga_total");
    const hargaJual = parseFloat(document.getElementById("harga_jual").value) || 0;

    jumlahInput.addEventListener("input", function () {
        let jumlah = parseFloat(this.value) || 0;
        let total = jumlah * hargaJual;
        hargaTotalInput.value = total;
    });

});
</script>
@endpush
