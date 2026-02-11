<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $toko = Toko::first();   // ambil 1 toko
        $produk = Produk::all();
        $kategori = Kategori::all();

        return view('produk.index', compact('produk', 'toko'));
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

public function store(Request $request)
{
    $request->validate([
        'nama_produk'   => 'required',
        'id_kategori'   => 'required',
        'harga_pokok'   => 'required|numeric',
        'harga_jual'    => 'required|numeric',
        'gambar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // upload gambar
    $gambar = 'default.png';
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar')->store('produk', 'public');
    }
Produk::create([
    'id_produk_server' => 0,
    'id_toko' => 1,
    'id_kategori' => $request->id_kategori,
    'nama_produk' => $request->nama_produk,

    'harga_pokok' => $request->harga_pokok,
    'harga_jual'  => $request->harga_jual,
    'harga_diskon' => $request->harga_diskon ?? 0,
    'is_diskon'    => $request->is_diskon ?? 'tidak',

    'harga_grosir' => $request->harga_grosir ?? 0,
    'min_grosir'   => $request->min_grosir ?? 0,

    'dijual' => $request->dijual ?? 'dijual',
    'kode_produk' => $request->kode_produk,

    'pengaturan_stok' => $request->pengaturan_stok,
    'pengaturan_harga_stok' => $request->pengaturan_harga_stok,
    'pengaturan_harga_jual' => $request->pengaturan_harga_jual,

    'satuan' => $request->satuan,
    'berat' => $request->berat ?? 0,
    'lokasi' => $request->lokasi,
    'deskripsi_produk' => $request->deskripsi_produk,

    'gambar' => $gambar,

    'jumlah_stok' => 0,
    'limit_stok' => 0,
    'harga_total_limit_stok' => 0,
    'harga_satu_beli_stok' => 0,

    // WAJIB ISI
    'serial_number' => 'SN-' . time(),
    'multi_produk' => 0,
    'varian_harga_jual' => '',
    'ekstra_produk' => '',
    'harga_jual_margin' => 0,
]);


    return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil ditambahkan');
}
public function edit($id)
{
    $produk = Produk::findOrFail($id);
    $kategori = Kategori::all();

    return view('produk.edit', compact('produk', 'kategori'));
}
public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $data = $request->all();

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('produk', 'public');
    }

    $produk->update($data);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
}







}
