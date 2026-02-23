<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Produk;
use App\Models\Stok;
// use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Tampilkan daftar stok untuk produk tertentu di toko tertentu
     *
     * @param  int  $id_toko
     * @param  int  $id_produk
     * @return \Illuminate\View\View
     */
    public function index($id_toko, $id_produk)
    {
        // Ambil data toko, jika tidak ditemukan akan otomatis 404
        $toko = Toko::findOrFail($id_toko);

        // Ambil data produk dari toko yang bersangkutan
        $produk = Produk::where('id_produk', $id_produk)
                        ->where('id_toko', $id_toko)
                        ->firstOrFail(); // pastikan ada firstOrFail()

        // Ambil data stok terkait produk, urut dari terbaru
        $stok = Stok::where('id_produk', $id_produk)
                    ->orderBy('created_at', 'desc')
                    ->get();

        // Jika stok kosong, bisa dikasih notifikasi kosong (opsional)
        // $stok->isEmpty() ? session()->flash('info', 'Stok untuk produk ini masih kosong.') : null;

        return view('produk.stok', [
            'toko' => $toko,
            'produk' => $produk,
            'stok' => $stok
        ]);
    }
}
