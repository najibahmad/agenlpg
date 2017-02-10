<table id="example2" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="6" align="center" style="font-size:12px"><h2> Penerimaan dan Pengeluaran Kas </h2></th>
      </tr>
      <tr>
        <th colspan="6" align="center"><h2> PT. Java Gas Makmur </h2></th>
      </tr>
      <tr>
        <th colspan="6" align="center">

        <b>Bulan {{$bulan_indo}} Tahun {{$tahun_ini}}</b></th>
      </tr>
      <tr>
        <th colspan="6" align="center"></th>
      </tr>
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

      <td><?=$no?></td>
      <td><?=$row->tanggal?></td>
      <td><?=$row->transaksi?></td>
      <td><?=$row->kredit?></td>
      <td><?=$row->debet?></td>
      <td><strong><div align=right><?=($row->balance)?></div></strong></td>


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
