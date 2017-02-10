<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bulan;
use App\Tahun;
use App\Jurnal;
use Illuminate\Support\Facades\DB;
use Excel;

class ReportController extends Controller
{
    //
    /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth');
      }

      //report jurnal /ppkas
      public function ppkas(Request $request)
      {
        //
        //$list_tahun = Tahun::OderBy('tahun')->pluck('tahun','tahun');
        $list_tahun = Tahun::orderBy('tahun')->pluck('tahun', 'tahun');
        $list_bulan = Bulan::pluck('bulan','id');

        $bulan_ini    = $request->input('bulan');
        $tahun_ini      = $request->input('tahun');

        if(!empty($bulan_ini) && !empty($tahun_ini)){
          //ambil kas
          //$kas_jurnal = DB::queryFirstRow("SELECT * FROM jurnal WHERE bulan=".$_POST['bulan']." AND tahun='".$_POST['tahun']."'");
          $kas_jurnal = Jurnal::where('tahun', $tahun_ini)
                                ->where('bulan', $bulan_ini)->first();
          $kas_awal = 0;
          $flag=0;
          if(count($kas_jurnal)>0){
            $flag=1;
            $kas_awal = $kas_jurnal->kas_awal;
          }


          //$rekap_penjualan = DB::queryFirstRow("SELECT sum(total_harga) as rekap FROM transaksi WHERE month(tanggal)=".$_POST['bulan']." AND year(tanggal)=".$_POST['tahun']." AND jenis_transaksi='kredit'");
          $rekap = DB::table('transaksi')
                          ->leftJoin('pelanggan', 'pelanggan.id', '=', 'transaksi.id_pelanggan')
                          ->whereRaw('year(tanggal) = '.$tahun_ini)
                          ->whereRaw('month(tanggal) = '.$bulan_ini)
                          ->orderBy('tanggal')
                          ->get();


          //tambah data dijurnal

          $saldo_akhir = 0;
          $rekap_bulanan = DB::table('transaksi')
                          ->select('jenis_transaksi', DB::raw('sum(total_harga) as total_harga'))
                          ->whereRaw('year(tanggal) = '.$tahun_ini)
                          ->whereRaw('month(tanggal) = '.$bulan_ini)
                          ->groupBy('jenis_transaksi')
                          ->orderBy('jenis_transaksi')
                          ->get();
        $saldo_akhir += $kas_awal;
        if(($saldo_akhir)>0){

          foreach ($rekap_bulanan as $row) {
            if($row->jenis_transaksi=='debet'){
              $saldo_akhir -= $row->total_harga;
            }
            else{
              $saldo_akhir += $row->total_harga;
            }
          }
          $flag2=0;

          if($bulan_ini<12){
            $cek = Jurnal::where('tahun', $tahun_ini)
                                ->where('bulan', $bulan_ini+1)->first();
          }
          else {
            $cek = Jurnal::where('tahun', $tahun_ini+1)
                                ->where('bulan', 1)->first();
          }

          if(count($cek)>0){
            $flag2=1;
          }

          if($flag2==1){
            if($bulan_ini<12){
              //update
              Jurnal::where('bulan', $bulan_ini+1)
                  ->where('tahun', $tahun_ini)
                  ->update(['kas_awal' => $saldo_akhir]);

            }
            else if ($bulan_ini==12){
              Jurnal::where('bulan', 1)
                  ->where('tahun', $tahun_ini+1)
                  ->update(['kas_awal' => $saldo_akhir]);
            }
          }
          else if($flag2==0){
            if($bulan_ini<12) Jurnal::create(['tahun' => $tahun_ini, 'bulan' => $bulan_ini+1, 'kas_awal'=>$saldo_akhir, 'kas_akhir'=>0]);
            else if($bulan_ini==12) Jurnal::create(['tahun' => $tahun_ini+1],['bulan' => 1],['kas_awal'=>$saldo_akhir]);
          }
        }

        $bln = Bulan::where('id', $bulan_ini)->first();
        $bulan_indo = $bln->bulan;

        if($request->has('download')){
             $pdf = Excel::create('jurnal_'.$bulan_indo.'_'.$tahun_ini, function($excel)  use ($kas_awal, $rekap, $list_tahun, $list_bulan, $bulan_ini, $tahun_ini, $flag,$bulan_indo) {
               $excel->sheet($bulan_indo.'_'.$tahun_ini, function($sheet) use ($kas_awal, $rekap, $list_tahun, $list_bulan, $bulan_ini, $tahun_ini, $flag,$bulan_indo) {
                 $sheet->loadView('report.print.ppkas')
                 ->with('kas_awal',$kas_awal)
                 ->with('rekap',$rekap)
                 ->with('list_tahun',$list_tahun)
                 ->with('list_bulan',$list_bulan)
                 ->with('bulan_ini',$bulan_ini)
                 ->with('tahun_ini',$tahun_ini)
                 ->with('bulan_indo',$bulan_indo)
                 ->with('flag',$flag);
               });
             });

             return $pdf->download('xlsx');
         }


          //dd($rekap_penjualan);
          return view('report.ppkas', compact('list_tahun','list_bulan','bulan_ini','tahun_ini','rekap','kas_awal','flag'));

        }

        //dd($tahun);

        return view('report.ppkas', compact('list_tahun','list_bulan','bulan_ini','tahun_ini'));
    }

    public function arusKas(Request $request)
    {
      //
      //$list_tahun = Tahun::OderBy('tahun')->pluck('tahun','tahun');
      $list_tahun = Tahun::orderBy('tahun')->pluck('tahun', 'tahun');
      $list_bulan = Bulan::pluck('bulan','id');

      $bulan_ini    = $request->input('bulan');
      $tahun_ini      = $request->input('tahun');

      if(!empty($bulan_ini) && !empty($tahun_ini)){
        //ambil kas
        //$kas_jurnal = DB::queryFirstRow("SELECT * FROM jurnal WHERE bulan=".$_POST['bulan']." AND tahun='".$_POST['tahun']."'");
        $kas_jurnal = Jurnal::where('tahun', $tahun_ini)
                              ->where('bulan', $bulan_ini)->first();
        $kas_awal = 0;
        $total_pengeluaran = 0;
        $flag=0;
        if(count($kas_jurnal)>0){
          $kas_awal = $kas_jurnal->kas_awal;
          $flag=1;
        }



        //$rekap_penjualan = DB::queryFirstRow("SELECT sum(total_harga) as rekap FROM transaksi WHERE month(tanggal)=".$_POST['bulan']." AND year(tanggal)=".$_POST['tahun']." AND jenis_transaksi='kredit'");
        $rekap_penjualan = DB::table('transaksi')
                        ->select('transaksi', DB::raw('sum(total_harga) as rekap'))
                        ->whereRaw('year(tanggal) = '.$tahun_ini)
                        ->whereRaw('month(tanggal) = '.$bulan_ini)
                        ->where('jenis_transaksi','=','kredit')
                        ->groupBy('transaksi')
                        ->get();
        $total_pendapatan = $kas_awal;
        foreach($rekap_penjualan as $row){
          $flag=1;
          $total_pendapatan = $total_pendapatan + $row->rekap;
        }

        //dd($rekap_penjualan);
        $rekap_pengeluaran = DB::table('transaksi')
                        ->select('transaksi', DB::raw('sum(total_harga) as rekap'))
                        ->whereRaw('year(tanggal) = '.$tahun_ini)
                        ->whereRaw('month(tanggal) = '.$bulan_ini)
                        ->where('jenis_transaksi','=','debet')
                        ->groupBy('transaksi')
                        ->get();
       //dd($rekap_pengeluaran);
       foreach($rekap_pengeluaran as $row){
         $flag=1;
         $total_pengeluaran = $total_pengeluaran + $row->rekap;
       }

       $bln = Bulan::where('id', $bulan_ini)->first();
       $bulan_indo = $bln->bulan;

       if($request->has('download')){
            $pdf = Excel::create('aruskas_'.$bulan_indo.'_'.$tahun_ini, function($excel)  use ($kas_awal, $rekap_penjualan, $rekap_pengeluaran,$total_pendapatan, $total_pengeluaran, $list_tahun, $list_bulan, $bulan_ini, $tahun_ini, $flag,$bulan_indo) {
              $excel->sheet($bulan_indo.'_'.$tahun_ini, function($sheet) use ($kas_awal, $rekap_penjualan, $rekap_pengeluaran,$total_pendapatan, $total_pengeluaran, $list_tahun, $list_bulan, $bulan_ini, $tahun_ini, $flag,$bulan_indo) {
                $sheet->loadView('report.print.aruskas')
                ->with('kas_awal',$kas_awal)
                ->with('rekap_pengeluaran',$rekap_pengeluaran)
                ->with('rekap_penjualan',$rekap_penjualan)
                ->with('total_pendapatan',$total_pendapatan)
                ->with('total_pengeluaran',$total_pengeluaran)
                ->with('list_tahun',$list_tahun)
                ->with('list_bulan',$list_bulan)
                ->with('bulan_ini',$bulan_ini)
                ->with('tahun_ini',$tahun_ini)
                ->with('bulan_indo',$bulan_indo)
                ->with('flag',$flag);
              });
            });

            return $pdf->download('xlsx');
        }
      //dd($flag);
      return view('report.aruskas', compact('kas_awal','rekap_pengeluaran','rekap_penjualan','total_pendapatan','total_pengeluaran','list_tahun','list_bulan','bulan_ini','tahun_ini','flag'));

      }

      //dd($tahun);

      return view('report.aruskas', compact('kas_awal','rekap_pengeluaran','rekap_penjualan','total_pendapatan','total_pengeluaran','list_tahun','list_bulan','bulan_ini','tahun_ini','flag'));
  }
}
