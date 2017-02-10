<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'pelanggan',
        'kode_pelanggan',
    ];
}
