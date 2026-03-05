<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Customer;
class CustomerController extends Controller
{
public function index($id_toko)
    {
        // ambil data toko berdasarkan id
        $toko = Toko::findOrFail($id_toko);

        // ambil customer berdasarkan toko
        $customer = Customer::where('id_toko', $id_toko)->get();

        return view('customer.index', compact('customer','toko','id_toko'));
    }
public function create($id_toko)
    {
        $toko = Toko::findOrFail($id_toko);

        return view('customer.create', compact('toko','id_toko'));
    }


    public function store(Request $request, $id_toko)
    {

        $request->validate([
            'nama_customer' => 'required',
            'no_hp' => 'required',
            'alamat' => 'nullable',
            'keterangan_customer' => 'nullable',
        ]);

        Customer::create([
            'id_toko' => $id_toko,
            'nama_customer' => $request->nama_customer,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan_customer' => $request->keterangan_customer,
            'point' => 0
        ]);

        return redirect()
            ->route('customer.index',$id_toko)
            ->with('success','Customer berhasil ditambahkan');
    }
public function edit($id_toko, $id_customer)
{
    $toko = Toko::findOrFail($id_toko);

    $customer = Customer::where('id_toko',$id_toko)
                ->where('id_customer',$id_customer)
                ->firstOrFail();

    return view('customer.edit', compact('toko','customer','id_toko'));
}


public function update(Request $request, $id_toko, $id_customer)
{
    $request->validate([
        'nama_customer' => 'required',
        'no_hp' => 'required',
        'point' => 'required|numeric'
    ]);

    $customer = Customer::where('id_toko',$id_toko)
                ->where('id_customer',$id_customer)
                ->firstOrFail();

    $customer->update([
        'nama_customer' => $request->nama_customer,
        'no_hp' => $request->no_hp,
        'point' => $request->point,
        'alamat' => $request->alamat,
        'keterangan_customer' => $request->keterangan_customer,
    ]);

    return redirect()
        ->route('customer.index',$id_toko)
        ->with('success','Customer berhasil diupdate');
}


public function destroy($id_toko, $id_customer)
{
    $customer = Customer::where('id_toko',$id_toko)
                ->where('id_customer',$id_customer)
                ->firstOrFail();

    $customer->delete();

    return redirect()
        ->route('customer.index',$id_toko)
        ->with('success','Customer berhasil dihapus');
}
}
