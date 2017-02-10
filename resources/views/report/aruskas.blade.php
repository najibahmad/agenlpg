@extends('admin.template')

@section('main')
<div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <h1 class="page-header">
                  Laporan
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="">Laporan</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-table"></i> ARUS KAS
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="box box-info">
      </div>
    </div>
  </div>


  <div class="row">
        <div class="col-md-12 text-center">
            <h2> ARUS KAS </h2>
            <h3>PT. Javagas Makmur</a> </h3>
            <br />
        </div>
    </div>

  <div class="row">
        <div class="col-md-6 col-md-offset-3">
					{!! Form::open(['url' => 'aruskas', 'method' => 'GET', 'id' => '']) !!}


						<div class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">


                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span class="help-block text-muted small-font"> Bulan </span>
                                @if(count($list_bulan) > 0)
                                    {!! Form::select('bulan', $list_bulan, $bulan_ini, ['class' => 'form-control', 'id' => 'id', 'placeholder' => 'Pilih bulan']) !!}
                                @else
                                    <p>Tidak ada pilihan bulan, buat dulu ya...!</p>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <span class="help-block text-muted small-font">  Tahun</span>
                                @if(count($list_tahun) > 0)
                                    {!! Form::select('tahun', $list_tahun, $tahun_ini, ['class' => 'form-control', 'id' => 'id', 'placeholder' => 'Pilih tahun']) !!}
                                @else
                                    <p>Tidak ada pilihan tahun, buat dulu ya...!</p>
                                @endif
                            </div>

												</div>

                        <div class="row">
													<br>
                        </div>
                        <div class="row" align="center">

                            <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                <input type="submit" name="go" value="Go" class="btn btn-warning btn-block" value="Buka Jurnal" />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
					{!! Form::close() !!}
            <!-- CREDIT CARD DIV END -->
        </div>
    </div>


    @if(isset($tahun_ini) && isset($bulan_ini))
    <div class="row">
          <div class="col-md-8 col-md-offset-2">

    @if($flag==0)
    <div class="panel panel-danger" align="center">
      <div class="panel-heading">Peringatan!</div>
      <div class="panel-body">MAAF! Data belum tersedia! Silahkan buka Jurnal bulan sebelumnya.</div>
    </div>
    @else
    <div class="panel panel-success" align="center">
      <div class="panel-heading">Peringatan!</div>
      <div class="panel-body">Pastikan data pada bulan sebelumnya sudah benar!.</div>

    </div>
    <div align="center">
    <a type="button" href="{{ route('aruskasexcel',['download'=>'excel', 'tahun'=>$tahun_ini, 'bulan'=>$bulan_ini]) }}" class="btn btn-success fa fa-file-pdf-o"> Download Data </a>
    </div>
    <br><br>
  <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th style="max-width:10px;"> NO </th>
            <th> DESKRIPSI </th>
            <th colspan="2" style="text-align:center"> NOMINAL (RP)</th>
          </tr>
          <tr>
            <th colspan="3"></th>
          </tr>
      </thead>
      <tbody>
          <tr>
            <td > A</td>
            <td> <b>Modal Awal </b></td>
            <td> </td>
            <td style="text-align:right"> <b><?=number_format($kas_awal,0)?></b></td>
          </tr>
          <tr>
            <td> </td>
            <td> Pendapatan</td>
            <td> </td>
            <td> </td>
          </tr>
          <?php
          $sum_penjualan = 0;
          foreach ($rekap_penjualan as $row) {
            $sum_penjualan += $row->rekap;
              ?>
              <tr>
                <td>  </td>
                <td> Penjualan <?=$row->transaksi?></td>
                <td style="text-align:right"> <?=number_format($row->rekap,0)?></td>
                <td> </td>
              </tr>
              <?php
            }
          ?>
          <tr>
            <td> </td>
            <td> Rekap Penjualan</td>
            <td style="text-align:right"><b><?=number_format($sum_penjualan,0)?></b></td>
            <td> </td>
          </tr>
          <tr>
            <td> </td>
            <td> <b>Total Pendapatan</b></td>
            <td> </td>
            <td style="text-align:right"><b> <?=number_format($total_pendapatan,0)?> </b></td>
          </tr>
          <tr>
            <td colspan="4"></td>
          <tr>
            <tr>
              <td> B</td>
              <td> <b>Harga Pokok Penjualan</b></td>
              <td> </td>
              <td> </td>
            </tr>
            <?php
              foreach ($rekap_pengeluaran as $row) {
                ?>
                <tr>
                  <td>  </td>
                  <td> <?=$row->transaksi?></td>
                  <td style="text-align:right"> <?=number_format($row->rekap,0)?></td>
                  <td> </td>
                </tr>
                <?php
              }
            ?>
            <tr>
              <td> </td>
              <td> <b>Total Pengeluaran</b></td>
              <td> </td>
              <td style="text-align:right"> <b><?=number_format($total_pengeluaran,0)?></b></td>
            </tr>

            <tr>
              <td colspan="4"></td>
            <tr>
              <tr>
                <td> C</td>
                <td colspan="2"> <b>SISA SALDO</b></td>

                <td style="text-align:right"><b><?=number_format($total_pendapatan-$total_pengeluaran)?> </b></td>
              </tr>

        </tbody>
</table>
    @endif
  @endif


      </div>
      <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- /#wrapper -->
@endsection

@section('script')

@endsection
