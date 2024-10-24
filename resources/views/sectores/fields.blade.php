<!-- Sect Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_descripcion', 'Descripción:', ['for' => 'sect_descripcion']) !!}
    {!! Form::text('sect_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('sect_descripcion') ? 'is-invalid' : (old('sect_descripcion') ? 'is-valid' : '')), 
        'id' => 'sect_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('sect_descripcion'))
        <small class="text-danger">
            {{ $errors->first('sect_descripcion') }}
        </small>
    @elseif (old('sect_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Sect Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_direccion', 'Dirección:', ['for' => 'sect_direccion']) !!}
    {!! Form::text('sect_direccion', null, [
        'class' => 'form-control ' . ($errors->has('sect_direccion') ? 'is-invalid' : (old('sect_direccion') ? 'is-valid' : '')), 
        'id' => 'sect_direccion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('sect_direccion'))
        <small class="text-danger">
            {{ $errors->first('sect_direccion') }}
        </small>
    @elseif (old('sect_direccion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Piso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_id', 'Piso:', ['for' => 'piso_id']) !!}
    {!! Form::select('piso_id', $piso, null, [
        'class' => 'form-control ' . ($errors->has('piso_id') ? 'is-invalid' : (old('piso_id') ? 'is-valid' : '')), 
        'id' => 'piso_id',
        'placeholder' => 'Seleccione una opción'
    ]) !!}
    @if ($errors->has('piso_id'))
        <small class="text-danger">
            {{ $errors->first('piso_id') }}
        </small>
    @elseif (old('piso_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>
