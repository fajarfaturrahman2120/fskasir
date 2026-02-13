<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Toko;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{

    public function index($id_toko)
    {
        // 1. Ambil data toko
        $toko = Toko::where('id_toko', $id_toko)->firstOrFail();

        // 2. Ambil kategori yang HANYA milik toko tersebut
        // Ganti Kategori::all() menjadi filter where agar tidak campur dengan toko lain
        $kategori = Kategori::where('id_toko', $id_toko)->get();

        // 3. Kembalikan ke view kategori, bukan produk
        return view('kategori.index', compact('toko', 'kategori'));
    }
    public function create($id_toko)
{
    // Cari toko berdasarkan ID agar variabel $toko tersedia di view
    $toko = Toko::where('id_toko', $id_toko)->firstOrFail();

    return view('kategori.create', compact('toko'));
}
   public function store(Request $request)
{
    $request->validate([
        'id_toko' => 'required',
        'kategori' => 'required|string|max:255',
        'jenis_transaksi' => 'required|string',
    ]);

    $kategori = Kategori::create([
        'id_toko' => $request->id_toko,
        'kategori' => $request->kategori,
        'jenis_transaksi' => $request->jenis_transaksi,
    ]);

    // Redirect ke index sesuai toko
    return redirect()->route('kategori.index', [
        'id_toko' => $request->id_toko
    ])->with('success', 'Data berhasil ditambahkan');
}

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'jenis_transaksi' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kategori' => $request->kategori,
            'jenis_transaksi' => $request->jenis_transaksi,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Data berhasil diupdate');
    }
    public function show($id_toko, $id_kategori)
    {
        // Ambil data toko untuk navigasi/sidebar
        $toko = Toko::where('id_toko', $id_toko)->firstOrFail();

        // Ambil data kategori spesifik
        $kategori = Kategori::findOrFail($id_kategori);

        return view('kategori.show', compact('toko', 'kategori'));
    }


}
