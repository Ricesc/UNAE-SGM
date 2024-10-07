<!-- Prov Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_nombre', 'Prov Nombre:') !!}
    {!! Form::text('prov_nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Prov Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_telefono', 'Prov Telefono:') !!}
    {!! Form::number('prov_telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Prov Ruc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_ruc', 'Prov Ruc:') !!}
    {!! Form::text('prov_ruc', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Prov Direccion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('prov_direccion', 'Prov Direccion:') !!}
    {!! Form::textarea('prov_direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Prov Localidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_localidad', 'Prov Localidad:') !!}
    {!! Form::text('prov_localidad', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>