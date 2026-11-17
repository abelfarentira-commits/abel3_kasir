<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'keterangan',
        'status',
    ];
}
