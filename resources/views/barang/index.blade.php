@extends('admin.template')

@section('main')
<div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <h1 class="page-header">
                  DAFTAR BARANG
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-table"></i> Barang
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->




        <div class="row">

            <div class="col-lg-8">
              <div class="tombol-nav">
                <a href="barang/create" class="btn btn-primary fa fa-plus"> Tambah Data Barang</a><br>
                  <p align="right"><strong> Jumlah Barang: {{ $jumlah_barang }} </strong></p>
            </div>

                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th style="text-align:center">Nama Barang</th>
                                <th style="text-align:center">Harga Jual</th>
                                <th style="text-align:center">Harga Beli</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i = ($barang_list->currentPage()-1)*$barang_list->perPage(); ?>
                          <?php foreach($barang_list as $row): ?>
                            <tr class="">
                                <td>{{ ++$i }}</td>
                                <td>{{ $row->barang }}</td>
                                <td>{{ $row->harga_jual }}</td>
                                <td>{{ $row->harga_beli }}</td>
                                <td style="max-width:100px">
                                  <div class="box-button">
                                    <div class="row" align="center">
                                      <div class="col-sm-6" align="center">{{ link_to('barang/' . $row->id . '/edit', ' ubah', ['class' => 'btn btn-warning btn-sm fa fa-edit ']) }}</div>
                                      <div class="col-sm-6">
                                          {!! Form::open(['method' => 'DELETE', 'action' => ['BarangController@destroy', $row->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
                                            {{Form::button(' hapus', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm fa fa-remove '))}}
                                        {!! Form::close() !!}
                                      </div>

                                    </div>



                                </div>
                                </td>
                            </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>

                    <div class="table-nav">

                      <div clas="paging">
                        {{ $barang_list->links() }}
                      </div>


                    </div>


                </div>
            </div>



        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- /#wrapper -->
@endsection

@section('script')
<script>
  $(function () {

    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
