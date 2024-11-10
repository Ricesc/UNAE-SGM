<!-- Btip Id Field -->
<div class="col-sm-12">
    {!! Form::label('btip_id', 'Tipo de Bien:') !!}
    <p>{{ $bienesSubTipo->btip->btip_descripcion ?? 'Sin descripcion' }}</p>
</div>

<!-- Bsti Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('bsti_descripcion', 'Sub Tipo de Bien:') !!}
    <p>{{ $bienesSubTipo->bsti_descripcion }}</p>
</div>

<!-- Bsti Detalle Field -->
<div class="col-sm-12">
    {!! Form::label('bsti_detalle', 'Detalle:') !!}
    <p>{{ $bienesSubTipo->bsti_detalle }}</p>
</div>

<!-- Bsti Costo Field -->
<div class="col-sm-12">
    {!! Form::label('bsti_costo', 'Costo:') !!}
    <p>{{ $bienesSubTipo->bsti_costo }}</p>
</div>

