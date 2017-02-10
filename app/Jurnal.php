<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    //
    protected $table = 'jurnal';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'bulan',
        'tahun',
        'kas_awal',
        'kas_akhir',
    ];
}
