@extends('admin.template')

@section('main')
<div id="page-wrapper">

    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
          <div class="col-lg-8">
              <h1 class="page-header">
                  TRANSAKSI KAS MASUK
              </h1>
              <ol class="breadcrumb">
                  <li>
                      <i class="fa fa-dashboard"></i>  <a href="">Transaksi</a>
                  </li>
                  <li class="active">
                      <i class="fa fa-table"></i> Kas Masuk
                  </li>
              </ol>
          </div>
      </div>
      <!-- /.row -->
  <div class="row">


    <div class="col-sm-offset-3 col-lg-6">

      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Transaksi KAS MASUK</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->




          {!! Form::open(['url' => 'transaksi_masuk', 'class' => 'form-horizontal']) !!}



          <div class="box-body">

            @if ($errors->any())
                <div class="form-group {{ $errors->has('transaksi') ? 'has-error' : 'has-success' }}">
            @else
                <div class="form-group">
            @endif
                {!! Form::label('transaksi', 'Barang :', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                @if(count($list_pelanggan) > 0)
                    {!! Form::select('transaksi', $list_barang, null, ['class' => 'form-control', 'id' => 'id', 'placeholder' => 'Pilih Barang']) !!}
                @else
                    <p>Tidak ada pilihan Barang, buat dulu ya...!</p>
                @endif
              </div>
                @if ($errors->has('transaksi'))
                    <span class="help-block">{{ $errors->first('transaksi') }}</span>
                @endif
            </div>

            @if ($errors->any())
                <div class="form-group {{ $errors->has('jumlah_barang') ? 'has-error' : 'has-success' }}">
            @else
                <div class="form-group">
            @endif
                {!! Form::label('jumlah_barang', 'Jumlah Barang:', ['class' => 'col-sm-4 control-label']) !!}
                  <div class="col-sm-8">
                {!! Form::text('jumlah_barang', null, ['class' => 'form-control', 'onkeyup' => 'sum()']) !!}
              </div>
                @if ($errors->has('jumlah_barang'))
                    <span class="help-block">{{ $errors->first('jumlah_barang') }}</span>
                @endif
            </div>



            @if ($errors->any())
                <div class="form-group {{ $errors->has('harga_satuan') ? 'has-error' : 'has-success' }}">
            @else
                <div class="form-group">
            @endif
                {!! Form::label('harga_satuan', 'Harga Satuan:', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::text('harga_satuan', null, ['class' => 'form-control', 'onkeyup' => 'sum()']) !!}
              </div>
                @if ($errors->has('harga_satuan'))
                    <span class="help-block">{{ $errors->first('harga_satuan') }}</span>
                @endif
            </div>

            @if ($errors->any())
                <div class="form-group {{ $errors->has('total_harga') ? 'has-error' : 'has-success' }}">
            @else
                <div class="form-group">
            @endif
                {!! Form::label('total_harga', 'Total Harga:', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::text('total_harga', null, ['class' => 'form-control']) !!}
              </div>
                @if ($errors->has('total_harga'))
                    <span class="help-block">{{ $errors->first('total_harga') }}</span>
                @endif
            </div>

          @if ($errors->any())
              <div class="form-group {{ $errors->has('id_pelanggan') ? 'has-error' : 'has-success' }}">
          @else
              <div class="form-group">
          @endif
              {!! Form::label('id_pelanggan', 'Pelanggan :', ['class' => 'col-sm-4 control-label']) !!}
              <div class="col-sm-8">
              @if(count($list_pelanggan) > 0)
                  {!! Form::select('id_pelanggan', $list_pelanggan, null, ['class' => 'form-control', 'id' => 'id', 'placeholder' => 'Pilih Pelanggan']) !!}
              @else
                  <p>Tidak ada pilihan pelanggan, buat dulu ya...!</p>
              @endif
            </div>
              @if ($errors->has('id_pelanggan'))
                  <span class="help-block">{{ $errors->first('id_pelanggan') }}</span>
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


      var txtFirstNumberValue = document.getElementById('jumlah_barang').value;
      var txtSecondNumberValue = document.getElementById('harga_satuan').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);

      if (!isNaN(result)) {
         //document.getElementById('total_harga').value = result;

         document.getElementById('total_harga').value = result;
         document.getElementById('total').innerText = 'Rp. '+result.toLocaleString()+ ',-';
      }
}
</script>
@endsection
