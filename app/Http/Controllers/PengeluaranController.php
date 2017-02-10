<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
use Validator;

class PengeluaranController extends Controller
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
        $pelanggan_list = Pengeluaran::orderBy('pengeluaran','asc')->paginate(10);
        $jumlah_pelanggan = Pengeluaran::count();
          //return $univ_list;
        return view('pengeluaran.index', compact('pelanggan_list','jumlah_pelanggan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pengeluaran.create');
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
          'pengeluaran' => 'required|string',
        ]);

        if($validator->fails()){
          return redirect('pengeluaran/create')->withInput()->withErrors($validator);
        }

        Pengeluaran::create($input);
        return redirect('pengeluaran');
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
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluaran'));
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
      $pengeluaran = Pengeluaran::findOrFail($id);
      $update = $request->all();
      $validator = Validator::make($update,[
        'pengeluaran' => 'required|string',
      ]);
      if($validator->fails()){
        return redirect('pengeluaran/'.$id.'/edit')->withInput()->withErrors($validator);
      }
      $pengeluaran->update($update);
      return redirect('pengeluaran');
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
      $pengeluaran = Pengeluaran::findOrFail($id);
      $pengeluaran->delete();
      return redirect('pengeluaran');
  }
}
