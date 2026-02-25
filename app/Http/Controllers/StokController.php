<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
    // ==============================
    // INDEX (lihat riwayat stok)
    // ==============================
    public function index($id_produk)
{
    $produk = Produk::with('toko')->findOrFail($id_produk);

    $riwayat = Stok::where('id_produk', $id_produk)
                    ->orderBy('created_at', 'desc')
                    ->get();

    // Hitung running saldo
    $saldo = $produk->jumlah_stok;

    foreach ($riwayat as $item) {
        $item->saldo = $saldo;

        if ($item->tipe == 'tambah') {
            $saldo -= $item->qty;
        } else {
            $saldo += $item->qty;
        }
    }

    return view('stok.index', compact('produk','riwayat'));
}

    // ==============================
    // FORM TAMBAH STOK
    // ==============================
    public function create($id_produk)
    {
         $produk = Produk::with('toko')->findOrFail($id_produk);
        return view('stok.create', compact('produk'));
    }

    // ==============================
    // SIMPAN TAMBAH STOK
    // ==============================
    public function store(Request $request, $id_produk)
{
    $request->validate([
        'qty' => 'required|integer|min:1',
        'harga_total' => 'required|numeric',
        'tanggal_input' => 'required|date',
    ]);

    DB::transaction(function () use ($request, $id_produk) {

        $produk = Produk::lockForUpdate()->findOrFail($id_produk);

        // Update stok utama
        $produk->increment('jumlah_stok', $request->qty);

        $hargaSatuan = $request->harga_total / $request->qty;

        Stok::create([
            'id_produk' => $id_produk,
            'tipe' => 'tambah',
            'qty' => $request->qty,
            'supplier' => $request->supplier,
            'harga_total' => $request->harga_total,
            'harga_satuan' => $hargaSatuan,
            'status_bayar' => $request->status_bayar,
            'pembayaran' => $request->pembayaran,
            'tanggal_input' => $request->tanggal_input,
            'expired' => $request->expired,
            'keterangan' => $request->keterangan
        ]);
    });

    return redirect()
        ->route('stok.index', $id_produk)
        ->with('success', 'Stok berhasil ditambahkan');
}
}
