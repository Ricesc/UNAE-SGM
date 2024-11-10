<!-- Prov Id Field -->
<div class="col-sm-12">
    {!! Form::label('prov_id', 'Prov Id:') !!}
    <p>{{ $ingreso->prov->prov_nombre ?? 'Sin nombre de proveedor' }}</p>
</div>

<!-- Usu Id Field -->
<div class="col-sm-12">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    <p>{{ $ingreso->usu->name ?? 'Sin nombre de usuario' }}</p>
</div>

<!-- Ing Fecha Compra Field -->
<div class="col-sm-12">
    {!! Form::label('ing_fecha_compra', 'Ing Fecha Compra:') !!}
    <p>{{ $ingreso->ing_fecha_compra }}</p>
</div>

<!-- Ing Costo Total Field -->
<div class="col-sm-12">
    {!! Form::label('ing_costo_total', 'Ing Costo Total:') !!}
    <p>{{ $ingreso->ing_costo_total }}</p>
</div>

<!-- Ing Estado Field -->
<div class="col-sm-12">
    {!! Form::label('ing_estado', 'Ing Estado:') !!}
    <p>{{ $ingreso->ing_estado == 1 ? 'Activo' : 'Inactivo' }}</p>
</div>