<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
class ProdukController extends Controller
{

   public function index($id_toko)
    {
        $toko = Toko::where('id_toko', $id_toko)->firstOrFail();
        $produk = Produk::where('id_toko', $id_toko)->get();

        // Pastikan 'toko' dikirim ke view
        return view('produk.index', compact('produk', 'toko'));
    }
  // Tambahkan parameter $id_toko
    public function create($id_toko)
    {
        // Ambil data toko agar variabel $toko tersedia di Blade
        $toko = Toko::where('id_toko', $id_toko)->firstOrFail();
        $kategori = Kategori::where('id_toko', $id_toko)->get();

        return view('produk.create', compact('kategori', 'toko'));
    }
public function store(Request $request)
{
    // Ambil toko pertama yang ada
    $toko = Toko::first();
    if (!$toko) {
        return redirect()->back()->with('error', 'Toko belum tersedia.');
    }

    $request->validate([
       'id_toko' => 'required',
        'nama_produk' => 'required|string',
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'harga_pokok' => 'required|numeric',
        'harga_jual'  => 'required|numeric',
        'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

    ]);

    // Upload gambar
    $gambar = 'default.png';
    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar')->store('produk', 'public');
    }

    // Insert produk
    Produk::create([
        'id_produk_server' => 0,
        'id_toko' => $request->id_toko,
        'id_kategori'      => $request->id_kategori,
        'nama_produk'      => $request->nama_produk,
        'harga_pokok'      => $request->harga_pokok,
        'harga_jual'       => $request->harga_jual,
        'harga_diskon'     => $request->harga_diskon ?? 0,
        'is_diskon'        => $request->is_diskon ?? 'tidak',
        'harga_grosir'     => $request->harga_grosir ?? 0,
        'min_grosir'       => $request->min_grosir ?? 0,
        'dijual'           => $request->dijual ?? 'dijual',
        'kode_produk'      => $request->kode_produk ?? '',
        'pengaturan_stok'  => $request->pengaturan_stok ?? 'pakai stok',
        'pengaturan_harga_stok' => $request->pengaturan_harga_stok ?? 'otomatis',
        'pengaturan_harga_jual' => $request->pengaturan_harga_jual ?? 'margin',
        'satuan'           => $request->satuan ?? 'pcs',
        'berat'            => $request->berat ?? 0,
        'lokasi'           => $request->lokasi ?? 'Gudang',
        'deskripsi_produk' => $request->deskripsi_produk ?? '-',
        'gambar'           => $gambar,
        'jumlah_stok'      => $request->jumlah_stok ?? 0,
        'limit_stok'       => 0,
        'harga_total_limit_stok' => 0,
        'harga_satu_beli_stok'   => 0,
        'serial_number'    => 'SN-' . time(),
        'multi_produk'     => 0,
        'varian_harga_jual'=> $request->varian_harga_jual ?? null,
        'ekstra_produk'    => $request->ekstra_produk ?? null,
        'harga_jual_margin'=> $request->harga_jual_margin ?? 0,
    ]);
    // dd($request->all());
      return redirect()->route('produk.index', [
        'id_toko' => $request->id_toko
    ])->with('success', 'Data berhasil ditambahkan');


}


   public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();

        return view('produk.edit', compact('produk', 'kategori'));
    }
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate');
    }
   public function show($id_toko, $id_produk)
    {
        $toko = Toko::where('id_toko', $id_toko)->firstOrFail();
        $produk = Produk::where('id_produk', $id_produk)
            ->where('id_toko', $id_toko)
            ->firstOrFail();

        return view('produk.show', compact('toko', 'produk'));
    }



    // Hapus data
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')
                         ->with('success', 'Data berhasil dihapus!');
    }








}
