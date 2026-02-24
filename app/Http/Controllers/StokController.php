<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{
   public function index($produk_id)
{
    $produk = Produk::with('toko')->findOrFail($produk_id);

    $riwayat = Stok::where('id_produk', $produk_id)
                    ->latest()
                    ->get();

    $toko = $produk->toko;

    return view('stok.index', compact('produk', 'riwayat', 'toko'));
}

    public function store(Request $request, $produk_id)
    {
        $request->validate([
            'tipe' => 'required|in:tambah,kurang,kembalian',
            'qty' => 'required|integer|min:1'
        ]);

        $produk = Produk::findOrFail($produk_id);

        DB::transaction(function () use ($request, $produk, $produk_id) {

            if ($request->tipe == 'tambah' || $request->tipe == 'kembalian') {
                $produk->increment('stok', $request->qty);
            }

            if ($request->tipe == 'kurang') {
                if ($produk->stok < $request->qty) {
                    abort(400, 'Stok tidak cukup');
                }
                $produk->decrement('stok', $request->qty);
            }

            Stok::create([
                'produk_id' => $produk_id,
                'tipe' => $request->tipe,
                'qty' => $request->qty,
                'keterangan' => $request->keterangan
            ]);
        });

        return back()->with('success', 'Stok berhasil diperbarui');
    }
}
