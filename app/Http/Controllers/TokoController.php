<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        return view('toko.index', compact('toko'));
    }

    public function create()
    {
        return view('toko.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'no_hp'    => 'required|numeric',
            'password' => 'required|string|min:6',
            'alamat'   => 'required|string',
            'username' => 'required|string|unique:toko,username', // 🔴 tabel toko
        ]);

        Toko::create([
            'name'     => $request->name,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password),
            'alamat'   => $request->alamat,
            'username' => $request->username,
        ]);

        return redirect()->route('toko.index')
            ->with('success', 'Toko berhasil ditambahkan!');
    }

    public function show($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);
        return view('toko.show', compact('toko'));
    }

    public function edit($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);
        return view('toko.edit', compact('toko'));
    }

    public function update(Request $request, $id_toko)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'no_hp'  => 'required|numeric',
            'alamat' => 'required|string',
            'username' => 'required|string|unique:toko,username,' . $id_toko . ',id_toko',
        ]);

        $toko = Toko::findOrFail($id_toko);

        $toko->update([
            'name'   => $request->name,
            'no_hp'  => $request->no_hp,
            'alamat' => $request->alamat,
            'username' => $request->username,
        ]);

        return redirect()->route('toko.index')
            ->with('success', 'Data toko berhasil diupdate!');
    }

    public function destroy($id_toko)
    {
        Toko::destroy($id_toko);

        return redirect()->route('toko.index')
            ->with('success', 'Toko berhasil dihapus!');
    }
}
