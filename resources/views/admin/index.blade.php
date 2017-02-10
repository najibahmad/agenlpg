@extends('admin.template')

@section('main')
<div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <h1 class="page-header">
                  DASBOARD
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-table"></i> Laporan Harian
                  </li>
              </ol>
          </div>
      </div>

      <h2 class="page-header">Rekapitulasi Semua Transaksi Penjualan</h2>
      <div class="row">

        <?php
        $total = 0;
        foreach($rekap_all as $row): ?>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{ $row->transaksi }}<br>Terjual!</span>
                <span class="info-box-number">{{ $row->jumlah }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        <?php
        $total += $row->jumlah;
        endforeach ?>

        <!-- /.col -->


        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa-cart-plus fa"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Terjual!</span>
              <span class="info-box-number">{{$total}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <h2 class="page-header">Penjualan Hari ini</h2>

      <div class="row">

        <?php
        $total = 0;
        $total_harga = 0;
        foreach($rekap_today as $row): ?>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{ $row->transaksi }}<br>Terjual!</span>
                <span class="info-box-number">{{ $row->jumlah }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        <?php
        $total += $row->jumlah;
        $total_harga +=$row->total_harga;
      endforeach;

        $laba = $total_harga - $pengeluaran[0]->pengeluaran;
        ?>



        <!-- /.col -->


        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa-cart-plus fa"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Terjual!</span>
              <span class="info-box-number">{{$total}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>




      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">

            <h2 class="page-header">Rekapitulasi Transaksi Hari ini</h2>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Gas LPG Terjual <span class="pull-right badge bg-blue">{{$total}} Tabung</span></a></li>
                <li><a href="#">Penjualan <span class="pull-right badge bg-green">{{number_format($total_harga,0)}} IDR</span></a></li>
                <li><a href="#">Pengeluaran <span class="pull-right badge bg-yellow">{{number_format($pengeluaran[0]->pengeluaran,0)}} IDR</span></a></li>
                <li><a href="#">Pendapatan <span class="pull-right badge bg-green">{{number_format($laba,0)}} IDR</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <!-- /.col -->

        <!-- /.col -->
      </div>





    </div>
</div>
@endsection
