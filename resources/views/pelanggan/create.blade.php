@extends('admin.template')

@section('main')
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                TAMBAH DATA PELANGGAN
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="">DATA PELANGGAN</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> DETAIL DATA PELANGGAN
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->



    <div class="col-lg-6">


          {!! Form::open(['url' => 'pelanggan']) !!}
              @include('pelanggan.form', ['submitButtonText' => 'Tambah Pelanggan'])
          {!! Form::close() !!}

  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
