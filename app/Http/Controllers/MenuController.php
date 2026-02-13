<?php

namespace App\Http\Controllers;

// use App\Models\Menu;
use App\Models\Produk;
use App\Models\Toko;   // <- ini yang benar
// use Illuminate\Http\Request;

class MenuController extends Controller
{

public function index($id_toko)
{
    $toko = Toko::findOrFail($id_toko);
    $produk = Produk::where('id_toko', $id_toko)->get();

    return view('menu.index', compact('toko', 'produk'));
}


}
