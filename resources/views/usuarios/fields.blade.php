<!-- Usu Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_nombre', 'Usu Nombre:') !!}
    {!! Form::text('usu_nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Usu Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_apellido', 'Usu Apellido:') !!}
    {!! Form::text('usu_apellido', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Usu Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_rol', 'Usu Rol:') !!}
    {!! Form::number('usu_rol', null, ['class' => 'form-control']) !!}
</div>