<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    //
    protected $table = 'bulan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'bulan',
    ];
}
