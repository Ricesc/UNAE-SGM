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