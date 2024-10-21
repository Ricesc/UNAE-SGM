<!-- Btip Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('btip_descripcion', 'Tipo de Bien:', ['for' => 'btip_descripcion']) !!}
    {!! Form::text('btip_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('btip_descripcion') ? 'is-invalid' : (old('btip_descripcion') ? 'is-valid' : '')), 
        'id' => 'btip_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('btip_descripcion'))
        <small class="text-danger">
            {{ $errors->first('btip_descripcion') }}
        </small>
    @elseif (old('btip_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Btip Detalle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('btip_detalle', 'Detalle:', ['for' => 'btip_detalle']) !!}
    {!! Form::text('btip_detalle', null, [
        'class' => 'form-control ' . ($errors->has('btip_detalle') ? 'is-invalid' : (old('btip_detalle') ? 'is-valid' : '')), 
        'id' => 'btip_detalle'
    ]) !!}
    @if ($errors->has('btip_detalle'))
        <small class="text-danger">
            {{ $errors->first('btip_detalle') }}
        </small>
    @elseif (old('btip_detalle'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Btip Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('btip_costo', 'Costo:', ['for' => 'btip_costo']) !!}
    {!! Form::number('btip_costo', null, [
        'class' => 'form-control ' . ($errors->has('btip_costo') ? 'is-invalid' : (old('btip_costo') ? 'is-valid' : '')), 
        'id' => 'btip_costo'
    ]) !!}
    @if ($errors->has('btip_costo'))
        <small class="text-danger">
            {{ $errors->first('btip_costo') }}
        </small>
    @elseif (old('btip_costo'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Bsti Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_id', 'Sub Tipo de Bien:', ['for' => 'bsti_id']) !!}
    {!! Form::select('bsti_id', $bsti, null, [
        'class' => 'form-control ' . ($errors->has('bsti_id') ? 'is-invalid' : (old('bsti_id') ? 'is-valid' : '')), 
        'id' => 'bsti_id',
        'placeholder' => 'Seleccione una opción'
    ]) !!}
    @if ($errors->has('bsti_id'))
        <small class="text-danger">
            {{ $errors->first('bsti_id') }}
        </small>
    @elseif (old('bsti_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>
