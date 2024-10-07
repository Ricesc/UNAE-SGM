<!-- Bsti Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_id', 'Bsti Id:') !!}
    {!! Form::number('bsti_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Btip Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('btip_descripcion', 'Btip Descripcion:') !!}
    {!! Form::text('btip_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Btip Detalle Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('btip_detalle', 'Btip Detalle:') !!}
    {!! Form::textarea('btip_detalle', null, ['class' => 'form-control']) !!}
</div>

<!-- Btip Costo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('btip_costo', 'Btip Costo:') !!}
    {!! Form::number('btip_costo', null, ['class' => 'form-control']) !!}
</div>