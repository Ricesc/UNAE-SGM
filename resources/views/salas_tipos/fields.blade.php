<!-- Stip Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stip_descripcion', 'Tipo de Sala:', ['for' => 'stip_descripcion']) !!}
    {!! Form::text('stip_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('stip_descripcion') ? 'is-invalid' : (old('stip_descripcion') ? 'is-valid' : '')), 
        'id' => 'stip_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('stip_descripcion'))
        <small class="text-danger">
            {{ $errors->first('stip_descripcion') }}
        </small>
    @elseif (old('stip_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>