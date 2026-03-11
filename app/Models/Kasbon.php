<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasbon extends Model
{
    use HasFactory;

    protected $table = 'kasbon';
    protected $primaryKey = 'id_kasbon';

    protected $fillable = [
        'id_toko',
        'jumlah_kasbon',
        'nama_pengkasbon',
        'jenis_kasbon',
        'pembayaran_kasbon',
        'keterangan_kasbon',
        'tanggal_kasbon',
        'cicilan'
    ];

    protected $casts = [
        'tanggal_kasbon' => 'date',
    ];
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
