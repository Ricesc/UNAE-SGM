<!-- Bsti Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_descripcion', 'Sub Tipo de Bien:', ['for' => 'bsti_descripcion']) !!}
    {!! Form::text('bsti_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('bsti_descripcion') ? 'is-invalid' : (old('bsti_descripcion') ? 'is-valid' : '')), 
        'id' => 'bsti_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('bsti_descripcion'))
        <small class="text-danger">
            {{ $errors->first('bsti_descripcion') }}
        </small>
    @elseif (old('bsti_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Bsti Detalle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_detalle', 'Detalle:', ['for' => 'bsti_detalle']) !!}
    {!! Form::text('bsti_detalle', null, [
        'class' => 'form-control ' . ($errors->has('bsti_detalle') ? 'is-invalid' : (old('bsti_detalle') ? 'is-valid' : '')), 
        'id' => 'bsti_detalle'
    ]) !!}
    @if ($errors->has('bsti_detalle'))
        <small class="text-danger">
            {{ $errors->first('bsti_detalle') }}
        </small>
    @elseif (old('bsti_detalle'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Bsti Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_costo', 'Costo:', ['for' => 'bsti_costo']) !!}
    {!! Form::number('bsti_costo', null, [
        'class' => 'form-control ' . ($errors->has('bsti_costo') ? 'is-invalid' : (old('bsti_costo') ? 'is-valid' : '')), 
        'id' => 'bsti_costo'
    ]) !!}
    @if ($errors->has('bsti_costo'))
        <small class="text-danger">
            {{ $errors->first('bsti_costo') }}
        </small>
    @elseif (old('bsti_costo'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Btip Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('btip_id', 'Tipo de Bien:', ['for' => 'btip_id']) !!}
    {!! Form::select('btip_id', $btip, null, [
        'class' => 'form-control ' . ($errors->has('btip_id') ? 'is-invalid' : (old('btip_id') ? 'is-valid' : '')), 
        'id' => 'btip_id',
        'placeholder' => 'Seleccione una opción'
    ]) !!}
    @if ($errors->has('btip_id'))
        <small class="text-danger">
            {{ $errors->first('btip_id') }}
        </small>
    @elseif (old('btip_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

