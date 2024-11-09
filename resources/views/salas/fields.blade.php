<!-- Sect Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_id', 'Sector:') !!}
    {!! Form::select('sect_id', $sectores, null, [
    'class' => 'form-control' . ($errors->has('sect_id') ? ' is-invalid' : (old('sect_id') ? ' is-valid' : '')),
    'id' => 'sect_id'
    ]) !!}
    @if ($errors->has('sect_id'))
    <small class="text-danger">
        {{ $errors->first('sect_id') }}
    </small>
    @elseif (old('sect_id'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>

<!-- Stip Id Field -->
<!-- Stip Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stip_id', 'Tipo de sala:') !!}
    {!! Form::select('stip_id', $tipos, null, [
    'class' => 'form-control' . ($errors->has('stip_id') ? ' is-invalid' : (old('stip_id') ? ' is-valid' : '')),
    'id' => 'stip_id'
    ]) !!}
    @if ($errors->has('stip_id'))
    <small class="text-danger">
        {{ $errors->first('stip_id') }}
    </small>
    @elseif (old('stip_id'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>


<!-- Depe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_id', 'Dependencia:') !!}
    {!! Form::select('depe_id', $dependencias, null, [
    'class' => 'form-control' . ($errors->has('depe_id') ? ' is-invalid' : (old('depe_id') ? ' is-valid' : '')),
    'id' => 'depe_id'
    ]) !!}
    @if ($errors->has('depe_id'))
    <small class="text-danger">
        {{ $errors->first('depe_id') }}
    </small>
    @elseif (old('depe_id'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>

<!-- Sala Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_descripcion', 'Sala Descripcion:') !!}
    {!! Form::text('sala_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Sala Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_direccion', 'Sala Direccion:') !!}
    {!! Form::text('sala_direccion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Sala Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_capacidad', 'Sala Capacidad:') !!}
    {!! Form::number('sala_capacidad', null, ['class' => 'form-control']) !!}
</div>