@extends('admin.template')

@section('main')
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                TAMBAH DATA BARANG
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="">DATA BARANG</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> DETAIL DATA BARANG
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->



    <div class="col-lg-6">


          {!! Form::open(['url' => 'barang']) !!}
              @include('barang.form', ['submitButtonText' => 'Tambah Barang'])
          {!! Form::close() !!}

  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
