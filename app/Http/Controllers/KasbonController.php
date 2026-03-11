<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kasbon;
use App\Models\Toko;

class KasbonController extends Controller
{
    public function index($id_toko)
    {
        // Ambil data toko
        $toko = Toko::findOrFail($id_toko);

        // Ambil semua kasbon berdasarkan toko
        $kasbon = Kasbon::where('id_toko', $id_toko)->get();

        // Hitung total kasbon
        $total_kasbon = $kasbon->sum('jumlah_kasbon');

        return view('kasbon.index', compact('kasbon'));
    }
}
