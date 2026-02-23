<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok'; // nama tabel

    protected $primaryKey = 'id_stok'; // jika primary key bukan 'id'

    protected $fillable = [
        'id_produk',
        'jumlah',     // jumlah stok
        'keterangan', // optional, misal catatan stok
    ];

    public $timestamps = true;

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
