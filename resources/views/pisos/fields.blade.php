<!-- Edif Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Edificio', 'Edificio:') !!}
    {!! Form::select('Edificio', $edif, null, ['class' => 'form-select']) !!}
</div>

<!-- Piso Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_descripcion', 'Piso Descripcion:') !!}
    {!! Form::text('piso_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Piso Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_direccion', 'Piso Direccion:') !!}
    {!! Form::text('piso_direccion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>