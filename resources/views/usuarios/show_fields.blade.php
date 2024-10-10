<!-- Usu Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('usu_nombre', 'Nombre:') !!}
    <p>{{ $usuario->usu_nombre }}</p>
</div>

<!-- Usu Apellido Field -->
<div class="col-sm-12">
    {!! Form::label('usu_apellido', 'Apellido:') !!}
    <p>{{ $usuario->usu_apellido }}</p>
</div>

<!-- Usu Rol Field -->
<div class="col-sm-12">
    {!! Form::label('usu_rol', 'Rol:') !!}
    <p>{{ $usuario->usu_rol }}</p>
</div>

