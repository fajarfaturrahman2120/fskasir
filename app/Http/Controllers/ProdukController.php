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
    dd($request->all()); // 👈 cek dulu isi form

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
        // ...lanjutan
    ]);

    return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil ditambahkan');
}



}
