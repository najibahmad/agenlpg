@extends('admin.template')

@section('main')
<div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <h1 class="page-header">
                  TRANSAKSI KAS KELUAR
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="">Transaksi</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-table"></i> Kas Keluar
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->
  <div class="row">


    <div class="col-sm-offset-3 col-lg-6">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Transaksi KAS KELUAR</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->




          {!! Form::open(['url' => 'transaksi_keluar', 'class' => 'form-horizontal']) !!}



          <div class="box-body">

            @if ($errors->any())
                <div class="form-group {{ $errors->has('transaksi') ? 'has-error' : 'has-success' }}">
            @else
                <div class="form-group">
            @endif
                {!! Form::label('transaksi', 'Pengeluaran :', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                @if(count($list_pengeluaran) > 0)
                    {!! Form::select('transaksi', $list_pengeluaran, null, ['class' => 'form-control', 'id' => 'id', 'placeholder' => 'Pilih Pengeluaran']) !!}
                @else
                    <p>Tidak ada pilihan Pengeluaran, buat dulu ya...!</p>
                @endif
              </div>
                @if ($errors->has('transaksi'))
                    <span class="help-block">{{ $errors->first('transaksi') }}</span>
                @endif
            </div>





            @if ($errors->any())
                <div class="form-group {{ $errors->has('total_harga') ? 'has-error' : 'has-success' }}">
            @else
                <div class="form-group">
            @endif
                {!! Form::label('total_harga', 'Total Harga:', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::text('total_harga', null, ['class' => 'form-control', 'onkeyup' => 'sum()']) !!}
              </div>
                @if ($errors->has('total_harga'))
                    <span class="help-block">{{ $errors->first('total_harga') }}</span>
                @endif
            </div>






          </div>
          <div class="row">
              <div class="col-lg-12" align="center">
                  <h1 class="page-header">
                      TOTAL HARGA:<br>
                      <div id="total" style="font-size:30px">
                      </div>
                  </h1>

              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Simpan</button>
          </div>
          <!-- /.box-footer -->

        {!! Form::close() !!}
      </div>







    </div>
  </div>





    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- /#wrapper -->
@endsection

@section('script')
<script>
function sum() {



      var result = parseInt(document.getElementById('total_harga').value);

      if (!isNaN(result)) {

         document.getElementById('total').innerText = 'Rp. '+result.toLocaleString()+ ',-';
      }
}
</script>
@endsection
