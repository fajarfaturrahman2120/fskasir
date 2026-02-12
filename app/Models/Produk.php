<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
    'id_produk_server','id_toko','id_kategori','nama_produk',
    'harga_pokok','harga_jual','harga_diskon','is_diskon',
    'harga_grosir','min_grosir','dijual','kode_produk',
    'pengaturan_stok','pengaturan_harga_stok','pengaturan_harga_jual',
    'satuan','berat','lokasi','deskripsi_produk','gambar',
    'jumlah_stok','limit_stok','harga_total_limit_stok','harga_satu_beli_stok',
    'serial_number','multi_produk','varian_harga_jual','ekstra_produk','harga_jual_margin'
];

    public $timestamps = true;

    // Relasi ke toko
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id_toko');
    }
}
