<!-- Edif Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edif_descripcion', 'Edif Descripcion:') !!}
    {!! Form::text('edif_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Edif Direccion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('edif_direccion', 'Edif Direccion:') !!}
    {!! Form::textarea('edif_direccion', null, ['class' => 'form-control']) !!}
</div>