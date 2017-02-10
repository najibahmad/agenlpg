@extends('admin.template')

@section('main')
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                EDIT BARANG
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="">BARANG</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Edit BARANG
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="col-lg-6">


        {!! Form::model($barang, ['method' => 'PATCH', 'action' => ['BarangController@update', $barang->id]]) !!}
            @include('barang.form', ['submitButtonText' => 'Update Data Barang'])
        {!! Form::close() !!}

  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
