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
                      <i class="fa fa-table"></i> Penerimaan dan Pengeluaran Kas
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
            <h2> Penerimaan dan Pengeluaran Kas </h2>
            <h3>PT. Javagas Makmur</a> </h3>
            <br />
        </div>
    </div>

  <div class="row">
        <div class="col-md-6 col-md-offset-3">
					{!! Form::open(['url' => 'ppkas', 'method' => 'GET', 'id' => '']) !!}


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
    <a type="button" href="{{ route('ppkasexcel',['download'=>'excel', 'tahun'=>$tahun_ini, 'bulan'=>$bulan_ini]) }}" class="btn btn-success fa fa-file-pdf-o"> Download Data </a>
    </div>
    <br><br>

  <table id="example2" class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>No</th>

              <th style="text-align:center">Tanggal</th>
              <th style="text-align:center">Deskripsi</th>
              <th style="text-align:center">Masuk</th>
              <th style="text-align:center">Keluar</th>
              <th style="text-align:center">Saldo</th>
          </tr>
      </thead>
	<tbody>
		<?php

    ?>
    <tr>
      <td></td>
      <td></td>
      <td>SALDO</td>
      <td><div align=right><?=number_format($kas_awal,0)?></div></td>
      <td></td>
      <td><strong><div align=right><?=number_format($kas_awal,0)?></div></strong></td>

    </tr>
    <?php
		$temp="";
    $no=0;
    //$rekaps = json_decode($rekap, true);
    $kas=0;
		foreach ($rekap as $row) {
			$no++;

			if($no==1)$kas = $kas_awal;
			//ambil costumer


			//$row['jumlah_barang'] = ($row['jumlah_barang']);
			//$row->total_harga = rp($row->total_harga);
      if($row->jenis_transaksi =="debet"){
        $row->debet = "<div align=right>".(number_format($row->total_harga,0))."</div>";
        $row->kredit = "<div align=right>-</div>";
				$row->balance = $kas - $row->total_harga;


      }
      else {
        $row->kredit = "<div align=right>".number_format($row->total_harga,0)."</div>";
        $row->debet = "<div align=right>-</div>";
				$row->balance = $kas + $row->total_harga;
        $row->transaksi = 'Penjualan '.$row->transaksi.' ke '.$row->pelanggan;




      }
			$kas = $row->balance;
			$row->balance = "<div align=right>".number_format($row->balance,0)."</div>";
			$temp2 = $row->tanggal;
			if($row->tanggal==$temp){

				$row->tanggal="";
			}
			$temp = $temp2;

		?>
		<tr id="row_<?=$row->id?>">
      <tr>
        <td><?=$no?></td>
        <td><?=$row->tanggal?></td>
        <td><?=$row->transaksi?></td>
        <td><?=$row->kredit?></td>
        <td><?=$row->debet?></td>
        <td><strong><div align=right><?=($row->balance)?></div></strong></td>

      </tr>
		</tr>
		<?php }?>
		<tr>
      <td></td>
      <td></td>
      <td>SALDO AKHIR</td>
      <td><div align=right></div></td>
      <td></td>
      <td><strong><div align=right>
				<?php
						if($kas==0)
							$kas=$kas_awal;

							echo number_format($kas,0);


				?>
		</div></strong></td>

    </tr>
	</tbody>
</table>
    @endif
  @endif





    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- /#wrapper -->
@endsection

@section('script')

@endsection
