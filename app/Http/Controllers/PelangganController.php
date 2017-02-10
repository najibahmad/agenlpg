<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pelanggan;
use Validator;

class PelangganController extends Controller
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
        $pelanggan_list = Pelanggan::orderBy('pelanggan','asc')->paginate(10);
        $jumlah_pelanggan = Pelanggan::count();
          //return $univ_list;
        return view('pelanggan.index', compact('pelanggan_list','jumlah_pelanggan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pelanggan.create');
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
        //
        $input = $request->all();

        //validasi
        $validator = Validator::make($input,[
          'pelanggan' => 'required|string|min:5',
        ]);

        if($validator->fails()){
          return redirect('pelanggan/create')->withInput()->withErrors($validator);
        }

        Pelanggan::create($input);
        return redirect('pelanggan');
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
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
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
        $pelanggan = Pelanggan::findOrFail($id);
        $update = $request->all();
        $validator = Validator::make($update,[
          'pelanggan' => 'required|string|min:5',
        ]);
        if($validator->fails()){
          return redirect('pelanggan/'.$id.'/edit')->withInput()->withErrors($validator);
        }
        $pelanggan->update($update);
        return redirect('pelanggan');
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
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect('pelanggan');
    }
}
