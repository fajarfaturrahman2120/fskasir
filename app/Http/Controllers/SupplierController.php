<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Toko;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
   public function index($id_toko)
{
    $toko = Toko::findOrFail($id_toko);

    $suppliers = Supplier::where('id_toko', $id_toko)
                        ->latest()
                        ->paginate(10);

    return view('supplier.index', compact('suppliers','id_toko','toko'));
}
/*
    |--------------------------------------------------------------------------
    | CREATE - Tampilkan Form Tambah
    |--------------------------------------------------------------------------
    */
    public function create($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);

        return view('supplier.create', compact('toko'));
    }


    /*
    |--------------------------------------------------------------------------
    | STORE - Simpan Data
    |--------------------------------------------------------------------------
    */
    public function store(Request $request, $id_toko)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'no_hp'         => 'required|string|max:20',
            'keterangan'    => 'nullable|string'
        ]);

        Supplier::create([
            'id_toko'       => $id_toko,
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()
            ->route('supplier.index', $id_toko)
            ->with('success', 'Supplier berhasil ditambahkan');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT - Tampilkan Form Edit
    |--------------------------------------------------------------------------
    */
    public function edit($id_toko, $id_supplier)
    {
        $toko = Toko::findOrFail($id_toko);

        $supplier = Supplier::where('id_toko', $id_toko)
                            ->where('id_supplier', $id_supplier)
                            ->firstOrFail();

        return view('supplier.edit', compact('supplier', 'toko'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE - Update Data
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id_toko, $id_supplier)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'no_hp'         => 'required|string|max:20',
            'keterangan'    => 'nullable|string'
        ]);

        $supplier = Supplier::where('id_toko', $id_toko)
                            ->where('id_supplier', $id_supplier)
                            ->firstOrFail();

        $supplier->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat'        => $request->alamat,
            'no_hp'         => $request->no_hp,
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()
            ->route('supplier.index', $id_toko)
            ->with('success', 'Supplier berhasil diupdate');
    }
}
