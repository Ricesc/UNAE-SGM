<!-- Sala Id Field -->
<div class="col-sm-12">
    {!! Form::label('sala_id', 'Sala Id:') !!}
    <p>{{ $transferencia->sala->sala_descripcion ?? 'Sin descripcion' }}</p>
</div>

<!-- Usu Id Field -->
<div class="col-sm-12">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    <p>{{ $transferencia->usu->name ?? 'Sin nombre de usuario' }}</p>
</div>

<!-- Tran Fecha Field -->
<div class="col-sm-12">
    {!! Form::label('tran_fecha', 'Tran Fecha:') !!}
    <p>{{ $transferencia->tran_fecha }}</p>
</div>

<!-- Tran Procesado Field -->
<div class="col-sm-12">
    {!! Form::label('tran_procesado', 'Tran Procesado:') !!}
    <p>{{ $transferencia->tran_procesado == 1 ? 'Procesado' : 'Pendiente' }}</p>
</div>

