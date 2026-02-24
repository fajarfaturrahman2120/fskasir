<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok'; // nama tabel



    protected $fillable = [
        'produk_id',
        'tipe',
        'qty',
        'keterangan'
    ];

    public $timestamps = true;

    // Relasi ke produk
public function produk()
  {
    return $this->belongsTo(Produk::class, 'id_produk');
}
}
