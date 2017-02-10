<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Validator;

class BarangController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang_list = Barang::orderBy('barang','asc')->paginate(10);
        $jumlah_barang = Barang::count();
          //return $univ_list;
        return view('barang.index', compact('barang_list','jumlah_barang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
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

        //validasi
        $validator = Validator::make($input,[
          'barang' => 'required|string',
        ]);

        if($validator->fails()){
          return redirect('barang/create')->withInput()->withErrors($validator);
        }

        Barang::create($input);
        return redirect('barang');
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
        $barang = Barang::findOrFail($id);
        
        return view('barang.edit', compact('barang'));
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
      $barang = Barang::findOrFail($id);
      $update = $request->all();
      $validator = Validator::make($update,[
        'barang' => 'required|string',
      ]);
      if($validator->fails()){
        return redirect('barang/'.$id.'/edit')->withInput()->withErrors($validator);
      }
      $barang->update($update);
      return redirect('barang');
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
      $barang = Barang::findOrFail($id);
      $barang->delete();
      return redirect('barang');
  }
}
