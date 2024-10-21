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