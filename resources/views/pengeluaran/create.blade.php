@extends('admin.template')

@section('main')
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                TAMBAH ITEM PENGELUARAN
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="">Pengeluaran</a>
                </li>
                <li class="active">
                    <i class="fa fa-table"></i> Tambah Item Pengeluaran
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="col-lg-6">


          {!! Form::open(['url' => 'pengeluaran']) !!}
              @include('pengeluaran.form', ['submitButtonText' => 'Tambah Item Pengeluaran'])
          {!! Form::close() !!}

  </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection
