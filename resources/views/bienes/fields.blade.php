<!-- Btip Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bsti_id', 'Bsti Id:') !!}
    {!! Form::select('bsti_id', $bienes_sub_tipo, null, ['class' => 'form-control']) !!}
</div>



<!-- Sala Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_id', 'Sala Id:') !!}
    {!! Form::select('sala_id', $sala, null, ['class' => 'form-control']) !!}
</div>



<!-- Idet Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idet_id', 'Idet Id:') !!}
    {!! Form::number('idet_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bien Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bien_estado', 'Bien Estado:') !!}
    {!! Form::number('bien_estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Bien Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bien_codigo', 'Bien Codigo:') !!}
    {!! Form::text('bien_codigo', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>