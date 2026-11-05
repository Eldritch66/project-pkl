<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';

    protected $fillable = [
        'kode',
        'nama',
    ];
}
