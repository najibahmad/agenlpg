<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'transaksi',
        'jumlah_barang',
        'total_harga',
        'jenis_transaksi',
        'tanggal',
        'harga_satuan',
        'id_pelanggan',
        'id_pengeluaran',
    ];

    public function pelanggan(){
      return $this->belongsTo('App\Pelanggan','id_transaksi');
    }

}
