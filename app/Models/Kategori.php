<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{


    protected $table = 'kategori';
    protected $primaryKey = 'no';

    protected $fillable = [
        'kategori',
        'Jenis_kategori',


    ];

    public $timestamps = true;

    // Relasi ke toko
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id_toko');
    }
}
