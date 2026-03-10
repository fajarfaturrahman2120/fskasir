<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = 'kasir';

    protected $primaryKey = 'id_kasir';

    protected $fillable = [
        'id_toko',
        'nama_kasir',
        'nik_kasir',
        'no_hp_kasir',
        'alamat_kasir',
        'keterangan'
    ];

    public $timestamps = true;

    // relasi ke tabel toko
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
