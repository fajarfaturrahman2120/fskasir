<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';
    protected $primaryKey = 'id_toko';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'no_hp',
        'password',
        'alamat',
        'username'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko', 'id_toko');
    }
}
