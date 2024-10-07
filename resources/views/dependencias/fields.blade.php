<!-- Depe Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_descripcion', 'Depe Descripcion:') !!}
    {!! Form::text('depe_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Depe Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_telefono', 'Depe Telefono:') !!}
    {!! Form::number('depe_telefono', null, ['class' => 'form-control']) !!}
</div>