<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Toko;

class KasirController extends Controller
{
    public function index($id_toko)
    {
        // ambil data toko
        $toko = Toko::findOrFail($id_toko);

        // ambil kasir berdasarkan toko
        $kasir = Kasir::where('id_toko', $id_toko)->paginate(10);

        return view('kasir.index', compact('kasir','toko','id_toko'));
    }

    public function create($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);

        return view('kasir.create', compact('id_toko','toko'));
    }

    public function store(Request $request, $id_toko)
    {
        $request->validate([
            'nama_kasir' => 'required',
            'nik_kasir' => 'required',
            'no_hp_kasir' => 'required',
        ]);

        Kasir::create([
            'id_toko' => $id_toko,
            'nama_kasir' => $request->nama_kasir,
            'nik_kasir' => $request->nik_kasir,
            'no_hp_kasir' => $request->no_hp_kasir,
            'alamat_kasir' => $request->alamat_kasir,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('kasir.index', $id_toko)
            ->with('success','Kasir berhasil ditambahkan');
    }
    public function edit($id_toko, $id_kasir)
    {
        $kasir = Kasir::findOrFail($id_kasir);

        return view('kasir.edit', compact('kasir','id_toko'));
    }

    public function update(Request $request, $id_toko, $id_kasir)
    {
        $request->validate([
            'nama_kasir' => 'required',
            'nik_kasir' => 'required',
            'no_hp_kasir' => 'required',
        ]);

        $kasir = Kasir::findOrFail($id_kasir);

        $kasir->update([
            'nama_kasir' => $request->nama_kasir,
            'nik_kasir' => $request->nik_kasir,
            'no_hp_kasir' => $request->no_hp_kasir,
            'alamat_kasir' => $request->alamat_kasir,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()
            ->route('kasir.index', $id_toko)
            ->with('success','Kasir berhasil diperbarui');
    }
    public function destroy($id_toko, $id_kasir)
    {
        $kasir = Kasir::findOrFail($id_kasir);

        $kasir->delete();

        return redirect()
            ->route('kasir.index', $id_toko)
            ->with('success','Kasir berhasil dihapus');
    }
}
