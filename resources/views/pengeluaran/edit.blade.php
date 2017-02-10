@extends('admin.template')

@section('main')
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                EDIT ITEM PENGELUARAN
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="">PENGELUARAN</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Edit Item Pengeluaran
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="col-lg-6">


        {!! Form::model($pengeluaran, ['method' => 'PATCH', 'action' => ['PengeluaranController@update', $pengeluaran->id]]) !!}
            @include('pengeluaran.form', ['submitButtonText' => 'Update Item Pengeluaran'])
        {!! Form::close() !!}

  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
