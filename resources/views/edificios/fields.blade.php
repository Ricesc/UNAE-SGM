<!-- Edif Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edif_descripcion', 'Edificio:', ['for' => 'edif_descripcion']) !!}
    {!! Form::text('edif_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('edif_descripcion') ? 'is-invalid' : (old('edif_descripcion') ? 'is-valid' : '')), 
        'id' => 'edif_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('edif_descripcion'))
        <small class="text-danger">
            {{ $errors->first('edif_descripcion') }}
        </small>
    @elseif (old('edif_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Edif Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edif_direccion', 'Dirección:', ['for' => 'edif_direccion']) !!}
    {!! Form::text('edif_direccion', null, [
        'class' => 'form-control ' . ($errors->has('edif_direccion') ? 'is-invalid' : (old('edif_direccion') ? 'is-valid' : '')), 
        'id' => 'edif_direccion'
    ]) !!}
    @if ($errors->has('edif_direccion'))
        <small class="text-danger">
            {{ $errors->first('edif_direccion') }}
        </small>
    @elseif (old('edif_direccion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>