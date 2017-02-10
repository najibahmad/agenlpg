

<table id="example2" class="table table-bordered table-hover" border="1">
    <thead>
      <tr>
        <th colspan="4" align="center" style="font-size:12px"><h2> ARUS KAS </h2></th>
      </tr>
      <tr>
        <th colspan="4" align="center"><h2> PT. Java Gas Makmur </h2></th>
      </tr>
      <tr>
        <th colspan="4" align="center">

        <b>Bulan {{$bulan_indo}} Tahun {{$tahun_ini}}</b></th>
      </tr>
      <tr>
        <th colspan="4"></th>
      </tr>
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
          <td style="text-align:right"> <b><?=number_format((int)$kas_awal,0)?></b></td>
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
