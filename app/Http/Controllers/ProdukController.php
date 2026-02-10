<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Toko;

class ProdukController extends Controller
{
    public function index()
    {
        $toko = Toko::first();   // ambil 1 toko
        $produk = Produk::all();

        return view('produk.index', compact('produk', 'toko'));
    }
public function create()
{
    return view('produk.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required',
        'id_kategori' => 'required',
        'harga_pokok' => 'required',
        'harga_jual' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // upload gambar
    $gambar = null;
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar')->store('produk', 'public');
    }

    Produk::create([
        'id_produk_server' => 0,
        'id_toko' => 1, // default toko
        'kategori' => $request->kategori,

        'nama_produk' => $request->nama_produk,
        'harga_pokok' => $request->harga_pokok,
        'harga_jual' => $request->harga_jual,

        'harga_diskon' => $request->harga_diskon ?? 0,
        'is_diskon' => $request->is_diskon ?? 'tidak',

        'harga_grosir' => $request->harga_grosir ?? 0,
        'min_grosir' => $request->min_grosir ?? 0,

        'kode_produk' => $request->kode_produk ?? '-',

        'pengaturan_stok' => $request->pengaturan_stok ?? 'tanpa stok',
        'pengaturan_harga_stok' => $request->pengaturan_harga_stok ?? 'manual',

        'jumlah_stok' => $request->jumlah_stok ?? 0,   // 🔥 WAJIB
        'limit_stok' => $request->limit_stok ?? 0,     // 🔥 WAJIB

        'harga_total_limit_stok' => 0,
        'harga_satu_beli_stok' => 0,

        'pengaturan_harga_jual' => $request->pengaturan_harga_jual ?? 'manual',

        'satuan' => $request->satuan ?? '-',
        'berat' => $request->berat ?? 0,
        'lokasi' => $request->lokasi ?? '-',

        'deskripsi_produk' => $request->deskripsi_produk ?? '-',
        'gambar' => $gambar ?? 'default.png',

        'serial_number' => '-',
        'dijual' => $request->dijual ?? 'dijual',
        'multi_produk' => 'tidak',
        'varian_harga_jual' => '-',
        'ekstra_produk' => '-',
        'harga_jual_margin' => 0,
    ]);

    return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil ditambahkan');
}

}
