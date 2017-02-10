<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Pengeluaran;
use App\Transaksi;
use App\Barang;
use Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function masuk(){

      $list_pelanggan = Pelanggan::pluck('pelanggan','id');
      $list_barang = Barang::pluck('barang','barang');


      return view('transaksi.masuk', compact('list_pelanggan','list_barang'));
    }

    public function keluar(){


      $list_pengeluaran = Pengeluaran::pluck('pengeluaran','pengeluaran');
      //dd($list_pengeluaran);

      return view('transaksi.keluar', compact('list_pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOut(Request $request)
    {
        //
        $input = $request->all();
        $input['jenis_transaksi'] = 'debet';
        $input['tanggal'] = date("Y-m-d");

        //validasi
        $validator = Validator::make($input,[
          'transaksi' => 'required',
          'total_harga' => 'required',

        ]);

        if($validator->fails()){
          return redirect('keluar')->withInput()->withErrors($validator);
        }

        Transaksi::create($input);

        return redirect('keluar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['jenis_transaksi'] = 'kredit';
        $input['tanggal'] = date("Y-m-d");

        //validasi
        $validator = Validator::make($input,[
          'transaksi' => 'required',
          'jumlah_barang' => 'required|numeric',
          'harga_satuan' => 'required|numeric',
          'total_harga' => 'required',
          'id_pelanggan' => 'required',
        ]);

        if($validator->fails()){
          return redirect('masuk')->withInput()->withErrors($validator);
        }

        Transaksi::create($input);

        return redirect('masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
