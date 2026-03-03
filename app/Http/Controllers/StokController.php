<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use App\Models\Supplier;

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

        $riwayat = Stok::with('supplier')
                ->where('id_produk', $id_produk)
                ->orderBy('created_at', 'desc')
                ->get();


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
        $produk = Produk::where('id_produk', $id_produk)->firstOrFail();
        $suppliers = Supplier::all();

        return view('stok.create', compact('produk', 'suppliers'));
    }

    /**
     * Simpan data stok
     */
    public function store(Request $request, $id_produk)
    {
        $request->validate([
            'id_supplier'     => 'required',
            'tanggal_input'   => 'required|date',
            'qty'             => 'required|integer|min:1',
            'harga_total'     => 'required|numeric|min:0',
            'status_bayar'    => 'required',
            'pembayaran'      => 'required',
        ]);

        $produk = Produk::where('id_produk', $id_produk)->firstOrFail();

        // Hitung harga satuan jika kosong
        $hargaSatuan = $request->harga_satuan;
        if (!$hargaSatuan && $request->qty > 0) {
            $hargaSatuan = $request->harga_total / $request->qty;
        }

        // Simpan ke tabel stok
        Stok::create([
            'id_produk'      => $produk->id_produk,
            'id_supplier'    => $request->id_supplier,
            'tanggal_input'  => $request->tanggal_input,
            'qty'            => $request->qty,
            'harga_total'    => $request->harga_total,
            'harga_satuan'   => $hargaSatuan,
            'status_bayar'   => $request->status_bayar,
            'pembayaran'     => $request->pembayaran,
            'expired'        => $request->expired, // pastikan name input diperbaiki
            'keterangan'     => $request->keterangan,
        ]);

        // Tambah stok ke tabel produk
    $produk->increment('jumlah_stok', (int)$request->qty);

        return redirect()
            ->route('stok.index', $produk->id_produk)
            ->with('success', 'Stok berhasil ditambahkan');
    }
// ==============================
// FORM KURANG STOK
// ==============================
public function kurang($id_produk)
{
    $produk = Produk::with('toko')->findOrFail($id_produk);
    return view('stok.kurang', compact('produk'));
}
// ==============================
// SIMPAN KURANG STOK
// ==============================
public function storeKurang(Request $request, $id_produk)
{
    $request->validate([
        'qty' => 'required|integer|min:1',
        'tanggal_input' => 'required|date',
        'keterangan' => 'nullable|string'
    ]);

    DB::transaction(function () use ($request, $id_produk) {

        $produk = Produk::lockForUpdate()->findOrFail($id_produk);

        // CEK STOK CUKUP
        if ($produk->jumlah_stok < $request->qty) {
            throw new \Exception('Stok tidak mencukupi');
        }

        // Kurangi stok utama
        $produk->decrement('jumlah_stok', $request->qty);

        // Simpan riwayat
        Stok::create([
            'id_produk' => $id_produk,
            'tipe' => 'kurang',
            'qty' => $request->qty,
            'harga_total' => 0,
            'harga_satuan' => 0,
            'tanggal_input' => $request->tanggal_input,
            'keterangan' => $request->keterangan
        ]);
    });

    return redirect()
        ->route('stok.index', $id_produk)
        ->with('success', 'Stok berhasil dikurangi');
}
public function createKembali($id_produk)
{
    $produk = Produk::where('id_produk', $id_produk)->firstOrFail();
    $suppliers = Supplier::all();

    return view('stok.kembali', compact('produk', 'suppliers'));
}
 public function storeKembali(Request $request, $id_produk)
{
    $request->validate([
        'id_supplier'   => 'required',
        'jumlah_stok'   => 'required|integer|min:1',
        'tanggal_input' => 'required|date',
        'status_bayar'  => 'required',
        'harga_total'   => 'required|numeric|min:0'
    ]);

    DB::transaction(function () use ($request, $id_produk) {

        $produk = Produk::lockForUpdate()
            ->where('id_produk', $id_produk)
            ->firstOrFail();

        $qty = (int) $request->jumlah_stok;

        // ❗ CEK supaya stok tidak minus
        if ($qty > $produk->jumlah_stok) {
            throw new \Exception('Jumlah retur melebihi stok tersedia');
        }

        // 🔴 Karena ini KEMBALI ke supplier → stok berkurang
        $produk->decrement('jumlah_stok', $qty);

        // Hitung harga satuan
        $hargaSatuan = $qty > 0
            ? $request->harga_total / $qty
            : 0;

        // Simpan riwayat
        Stok::create([
            'id_produk'     => $id_produk,
            'id_supplier'   => $request->id_supplier,
            'tipe'          => 'kembali',
            'qty'           => -$qty, // negatif karena keluar
            'harga_total'   => $request->harga_total,
            'harga_satuan'  => $hargaSatuan,
            'status_bayar'  => $request->status_bayar,
            'pembayaran'    => $request->pembayaran,
            'tanggal_input' => $request->tanggal_input,
            'keterangan'    => $request->keterangan
        ]);
    });

    return redirect()
        ->route('stok.index', $id_produk)
        ->with('success', 'Stok berhasil dikembalikan');
}
}
