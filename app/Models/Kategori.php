<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{


    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'kategori',
        'jenis_transaksi',


    ];

    public $timestamps = true;

    // Relasi ke toko
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id_toko');
    }
}
