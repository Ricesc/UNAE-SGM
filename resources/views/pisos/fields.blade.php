<!-- Piso Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_descripcion', 'Descripción:', ['for' => 'piso_descripcion']) !!}
    {!! Form::text('piso_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('piso_descripcion') ? 'is-invalid' : (old('piso_descripcion') ? 'is-valid' : '')), 
        'id' => 'piso_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('piso_descripcion'))
        <small class="text-danger">
            {{ $errors->first('piso_descripcion') }}
        </small>
    @elseif (old('piso_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Piso Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_direccion', 'Dirección:', ['for' => 'piso_direccion']) !!}
    {!! Form::text('piso_direccion', null, [
        'class' => 'form-control ' . ($errors->has('piso_direccion') ? 'is-invalid' : (old('piso_direccion') ? 'is-valid' : '')), 
        'id' => 'piso_direccion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('piso_direccion'))
        <small class="text-danger">
            {{ $errors->first('piso_direccion') }}
        </small>
    @elseif (old('piso_direccion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Edif Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edif_id', 'Edificio:', ['for' => 'edif_id']) !!}
    {!! Form::select('edif_id', $edif, null, [
        'class' => 'form-control ' . ($errors->has('edif_id') ? 'is-invalid' : (old('edif_id') ? 'is-valid' : '')), 
        'id' => 'edif_id', 
        'placeholder' => 'Seleccione una opción'
    ]) !!}
    @if ($errors->has('edif_id'))
        <small class="text-danger">
            {{ $errors->first('edif_id') }}
        </small>
    @elseif (old('edif_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>
