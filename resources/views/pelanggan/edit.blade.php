@extends('admin.template')

@section('main')
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                EDIT PELANGGAN
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="">Pelanggan</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Edit Pelanggan
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="col-lg-6">


        {!! Form::model($pelanggan, ['method' => 'PATCH', 'action' => ['PelangganController@update', $pelanggan->id]]) !!}
            @include('pelanggan.form', ['submitButtonText' => 'Update Data Pelanggan'])
        {!! Form::close() !!}

  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
