@extends('admin.template')

@section('main')
<div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <h1 class="page-header">
                  DAFTAR ITEM PENGELUARAN
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="">Dashboard</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-table"></i> Pengeluaran
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->




        <div class="row">

            <div class="col-lg-8">
              <div class="tombol-nav">
                <a href="pengeluaran/create" class="btn btn-primary fa fa-plus"> Tambah Data Pelanggan</a><br>
                  <p align="right"><strong> Jumlah Item Pengeluaran: {{ $jumlah_pelanggan }} </strong></p>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Item Pengeluaran</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i = ($pelanggan_list->currentPage()-1)*$pelanggan_list->perPage(); ?>
                          <?php foreach($pelanggan_list as $row): ?>
                            <tr class="">
                                <td>{{ ++$i }}</td>
                                <td>{{ $row->pengeluaran }}</td>
                                <td style="max-width:75px">
                                  <div class="box-button">
                                    <div class="row" align="center">
                                      <div class="col-sm-6" align="center">{{ link_to('pengeluaran/' . $row->id . '/edit', ' ubah', ['class' => 'btn btn-warning btn-sm fa fa-edit ']) }}</div>
                                      <div class="col-sm-6">
                                          {!! Form::open(['method' => 'DELETE', 'action' => ['PengeluaranController@destroy', $row->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
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
                        {{ $pelanggan_list->links() }}
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

@endsection
