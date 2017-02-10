@if (isset($universitas))
    {!! Form::hidden('id', $barang->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('barang') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('barang', 'Nama Barang:', ['class' => 'control-label']) !!}
    {!! Form::text('barang', null, ['class' => 'form-control']) !!}
    @if ($errors->has('barang'))
        <span class="help-block">{{ $errors->first('barang') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('harga_beli') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('harga_beli', 'Harga Beli:', ['class' => 'control-label']) !!}
    {!! Form::text('harga_beli', null, ['class' => 'form-control']) !!}
    @if ($errors->has('harga_beli'))
        <span class="help-block">{{ $errors->first('harga_beli') }}</span>
    @endif
</div>

@if ($errors->any())
    <div class="form-group {{ $errors->has('harga_jual') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('harga_jual', 'Harga Jual:', ['class' => 'control-label']) !!}
    {!! Form::text('harga_jual', null, ['class' => 'form-control']) !!}
    @if ($errors->has('harga_jual'))
        <span class="help-block">{{ $errors->first('harga_jual') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
