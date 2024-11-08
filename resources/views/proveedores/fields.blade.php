<!-- Prov Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_nombre', 'Nombre:', ['for' => 'prov_nombre']) !!}
    {!! Form::text('prov_nombre', null, [
        'class' => 'form-control ' . ($errors->has('prov_nombre') ? 'is-invalid' : (old('prov_nombre') ? 'is-valid' : '')), 
        'id' => 'prov_nombre',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('prov_nombre'))
        <small class="text-danger">
            {{ $errors->first('prov_nombre') }}
        </small>
    @elseif (old('prov_nombre'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Prov Teléfono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_telefono', 'Teléfono:', ['for' => 'prov_telefono']) !!}
    {!! Form::text('prov_telefono', null, [
        'class' => 'form-control ' . ($errors->has('prov_telefono') ? 'is-invalid' : (old('prov_telefono') ? 'is-valid' : '')), 
        'id' => 'prov_telefono',
        'placeholder' => 'Ingrese el número de teléfono'
    ]) !!}
    @if ($errors->has('prov_telefono'))
        <small class="text-danger">
            {{ $errors->first('prov_telefono') }}
        </small>
    @elseif (old('prov_telefono'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>


<!-- Prov RUC Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_ruc', 'RUC:', ['for' => 'prov_ruc']) !!}
    {!! Form::text('prov_ruc', null, [
        'class' => 'form-control ' . ($errors->has('prov_ruc') ? 'is-invalid' : (old('prov_ruc') ? 'is-valid' : '')), 
        'id' => 'prov_ruc',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('prov_ruc'))
        <small class="text-danger">
            {{ $errors->first('prov_ruc') }}
        </small>
    @elseif (old('prov_ruc'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Prov Dirección Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_direccion', 'Dirección:', ['for' => 'prov_direccion']) !!}
    {!! Form::text('prov_direccion', null, [
        'class' => 'form-control ' . ($errors->has('prov_direccion') ? 'is-invalid' : (old('prov_direccion') ? 'is-valid' : '')), 
        'id' => 'prov_direccion'
    ]) !!}
    @if ($errors->has('prov_direccion'))
        <small class="text-danger">
            {{ $errors->first('prov_direccion') }}
        </small>
    @elseif (old('prov_direccion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Prov Localidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_localidad', 'Localidad:', ['for' => 'prov_localidad']) !!}
    {!! Form::text('prov_localidad', null, [
        'class' => 'form-control ' . ($errors->has('prov_localidad') ? 'is-invalid' : (old('prov_localidad') ? 'is-valid' : '')), 
        'id' => 'prov_localidad',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('prov_localidad'))
        <small class="text-danger">
            {{ $errors->first('prov_localidad') }}
        </small>
    @elseif (old('prov_localidad'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>