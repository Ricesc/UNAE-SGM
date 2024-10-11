<!-- Bsti Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_descripcion', 'Sub Tipo de Bien:') !!}
    {!! Form::text('bsti_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Bsti Detalle Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('bsti_detalle', 'Detalle:') !!}
    {!! Form::textarea('bsti_detalle', null, ['class' => 'form-control']) !!}
</div>