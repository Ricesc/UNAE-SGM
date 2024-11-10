<!-- Depe Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_descripcion', 'Dependencia:', ['for' => 'depe_descripcion']) !!}
    {!! Form::text('depe_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('depe_descripcion') ? 'is-invalid' : (old('depe_descripcion') ? 'is-valid' : '')), 
        'id' => 'depe_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('depe_descripcion'))
        <small class="text-danger">
            {{ $errors->first('depe_descripcion') }}
        </small>
    @elseif (old('depe_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Depe Teléfono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_telefono', 'Teléfono:', ['for' => 'depe_telefono']) !!}
    {!! Form::text('depe_telefono', null, [
        'class' => 'form-control ' . ($errors->has('depe_telefono') ? 'is-invalid' : (old('depe_telefono') ? 'is-valid' : '')), 
        'id' => 'depe_telefono',
        'placeholder' => 'Ingrese el número de teléfono'
    ]) !!}
    @if ($errors->has('depe_telefono'))
        <small class="text-danger">
            {{ $errors->first('depe_telefono') }}
        </small>
    @elseif (old('depe_telefono'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>
