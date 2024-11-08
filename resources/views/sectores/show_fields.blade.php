<!-- Edificio Name Field -->
<div class="col-sm-12 mb-2">
    {!! Form::label('edificio', 'Edificio:') !!}
    <p>{{ $sector->piso->edif->edif_descripcion ?? 'No asignado' }}</p>
</div>

<!-- Piso Name Field -->
<div class="col-sm-12 mb-2">
    {!! Form::label('piso', 'Piso:') !!}
    <p>{{ $sector->piso->piso_descripcion ?? 'No asignado' }}</p>
</div>

<!-- Sect Descripcion Field -->
<div class="col-sm-12 mb-2">
    {!! Form::label('sect_descripcion', 'Descripción:') !!}
    <p>{{ $sector->sect_descripcion }}</p>
</div>

<!-- Sect Direccion Field -->
<div class="col-sm-12 mb-2">
    {!! Form::label('sect_direccion', 'Dirección:') !!}
    <p>{{ $sector->sect_direccion }}</p>
</div>
