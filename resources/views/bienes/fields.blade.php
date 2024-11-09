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
    {!! Form::label('bien_estado', 'Estado del Bien:') !!}
    {!! Form::select('bien_estado', [
    1 => 'Nuevo', // 1 para 'Nuevo'
    2 => 'Usado', // 2 para 'Usado'
    3 => 'Roto', // 3 para 'Roto'
    4 => 'Dañado', // 4 para 'Dañado'
    5 => 'En reparación' // 5 para 'En reparación'
    ], null, ['class' => 'form-control']) !!}
</div>




<!-- Bien Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bien_codigo', 'Bien Codigo:') !!}
    {!! Form::text('bien_codigo', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>