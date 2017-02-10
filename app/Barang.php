<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barang';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'barang',
        'harga_beli',
        'harga_jual',

    ];
}
