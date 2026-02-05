<?php

namespace App\Http\Controllers;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    public function index(){
    return view('/dashboard');
    }
    public function create(){
    return view('toko.create');
    }
    public function store(Request $request){
    $request->validate([
        'name'   => 'required|string|max:100',
        'no_hp'       => 'required|numeric',
        'password'    => 'required|string|min:6',
        'alamat_toko' => 'required|string',
        'username'    => 'required|string|unique:tokos,username',
    ]);

    Toko::create([

        'name'   => $request->nama_toko,
        'no_hp'       => $request->no_hp,
        'password'    => Hash::make($request->password), // 🔐 hash
        'alamat_toko' => $request->alamat_toko,
        'username'    => $request->username,
    ]);

    return redirect()->route('dashboard')
        ->with('success', 'Toko berhasil ditambahkan!');
}

}
