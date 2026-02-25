<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';

    protected $fillable = [
        'id_produk',
        'tipe',
        'qty',
        'supplier',
        'harga_total',
        'harga_satuan',
        'status_bayar',
        'pembayaran',
        'tanggal_input',
        'expired',
        'keterangan'
    ];

    protected $casts = [
        'tanggal_input' => 'date',
        'expired' => 'date'
    ];

    public $timestamps = true;

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
