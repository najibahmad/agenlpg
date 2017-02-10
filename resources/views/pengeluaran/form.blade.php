@if (isset($universitas))
    {!! Form::hidden('id', $pengeluaran->id) !!}
@endif

@if ($errors->any())
    <div class="form-group {{ $errors->has('pengeluaran') ? 'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('pengeluaran', 'Nama Item Pengeluaran:', ['class' => 'control-label']) !!}
    {!! Form::text('pengeluaran', null, ['class' => 'form-control']) !!}
    @if ($errors->has('pengeluaran'))
        <span class="help-block">{{ $errors->first('pengeluaran') }}</span>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
