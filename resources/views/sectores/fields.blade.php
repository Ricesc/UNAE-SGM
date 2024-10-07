<!-- Piso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_id', 'Piso Id:') !!}
    {!! Form::number('piso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sect Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_descripcion', 'Sect Descripcion:') !!}
    {!! Form::text('sect_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Sect Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_direccion', 'Sect Direccion:') !!}
    {!! Form::text('sect_direccion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>