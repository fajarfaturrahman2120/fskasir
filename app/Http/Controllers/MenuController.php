<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Toko;   // <- ini yang benar
use Illuminate\Http\Request;

class MenuController extends Controller
{
   public function index($id)
{
    $toko = Toko::findOrFail($id);
    return view('menu.index', compact('toko'));
}

}
