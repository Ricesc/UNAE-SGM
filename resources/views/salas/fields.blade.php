<!-- Sect Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_id', 'Sect Id:') !!}
    {!! Form::number('sect_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Stip Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stip_id', 'Stip Id:') !!}
    {!! Form::number('stip_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Depe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_id', 'Depe Id:') !!}
    {!! Form::number('depe_id', null, ['class' => 'form-control']) !!}
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