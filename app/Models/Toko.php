<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $fillable = [[
    'name',
    'no_hp',
    'password',
    'alamat',
    'username'
    ]];
}
