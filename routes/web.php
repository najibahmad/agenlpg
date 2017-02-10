<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    //pelanggan
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('pengeluaran', 'PengeluaranController');
    Route::resource('barang', 'BarangController');

    //report
    Route::get('pemasukan', 'ReportController@pemasukan');
    Route::get('tpengeluaran', 'ReportController@pengeluaran');
    Route::get('ppkas', 'ReportController@ppkas');
    Route::get('aruskas', 'ReportController@aruskas');

    Route::get('masuk', 'TransaksiController@masuk');
    Route::get('keluar', 'TransaksiController@keluar');

    Route::post('transaksi_masuk', 'TransaksiController@store');
    Route::post('transaksi_keluar', 'TransaksiController@storeOut');


    Route::get('aruskasexcel',array('as'=>'aruskasexcel','uses'=>'ReportController@aruskas'));
    Route::get('ppkasexcel',array('as'=>'ppkasexcel','uses'=>'ReportController@ppkas'));





    Route::get('register', function() {
      return redirect('/');
    });
});
