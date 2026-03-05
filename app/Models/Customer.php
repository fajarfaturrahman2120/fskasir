<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'id_toko',
        'nama_customer',
        'point',
        'keterangan_customer',
        'alamat',
        'no_hp'
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko', 'id_toko');
    }

}
