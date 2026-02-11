<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }
    public function create(){
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'jenis_transaksi' => 'required|string',
        ]);

        Kategori::create([
            'kategori' => $request->kategori,
            'jenis_transaksi' => $request->jenis_transaksi,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Data berhasil ditambahkan');
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


}
