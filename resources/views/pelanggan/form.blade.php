@if (isset($universitas))
    {!! Form::hidden('id', $pelanggan->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('pelanggan') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('pelanggan', 'Nama Pelanggan:', ['class' => 'control-label']) !!}
    {!! Form::text('pelanggan', null, ['class' => 'form-control']) !!}
    @if ($errors->has('pelanggan'))
        <span class="help-block">{{ $errors->first('pelanggan') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
