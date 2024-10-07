<!-- Sala Id Field -->
<div class="col-sm-12">
    {!! Form::label('sala_id', 'Sala Id:') !!}
    <p>{{ $transferencia->sala_id }}</p>
</div>

<!-- Usu Id Field -->
<div class="col-sm-12">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    <p>{{ $transferencia->usu_id }}</p>
</div>

<!-- Tran Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('tran_fecha', 'Tran Fecha:') !!}
    <p>{{ $transferencia->tran_fecha }}</p>
</div>

<!-- Tran Procesado Field -->
<div class="col-sm-12">
    {!! Form::label('tran_procesado', 'Tran Procesado:') !!}
    <p>{{ $transferencia->tran_procesado }}</p>
</div>

