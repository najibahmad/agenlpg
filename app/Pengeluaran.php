<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
  //
  protected $table = 'pengeluaran';

  protected $primaryKey = 'id';

  protected $fillable = [
      'id',
      'pengeluaran',
      'keterangan',
  ];

  public function transaksi(){
      return $this->hasMany('App\Transaksi','id_transaksi','id');
    }
}
