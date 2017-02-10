<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rekap_all = DB::table('transaksi')
                        ->select('transaksi', DB::raw('sum(jumlah_barang) as jumlah'))
                        ->where('jenis_transaksi','=','kredit')
                        ->groupBy('transaksi')
                        ->orderBy('transaksi')
                        ->get();
        $tgl = date("Y-m-d");
        $rekap_today = DB::table('transaksi')
                        ->select('transaksi', DB::raw('sum(jumlah_barang) as jumlah'), DB::raw('sum(total_harga) as total_harga'))
                        ->where('jenis_transaksi','=','kredit')
                        ->where('tanggal','=', $tgl)
                        ->groupBy('transaksi')
                        ->orderBy('transaksi')
                        ->get();

        $pengeluaran = DB::table('transaksi')
                        ->select( DB::raw('sum(total_harga) as pengeluaran'))
                        ->where('jenis_transaksi','=','debet')
                        ->where('tanggal','=', $tgl)
                        ->get();

        return view('admin.index', compact('rekap_all', 'rekap_today','pengeluaran'));
    }
}
