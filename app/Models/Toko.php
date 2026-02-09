<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
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
}
