<!-- Edificio y Piso -->
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ubicación de la Sala</h5>
        </div>
        <div class="card-body">
            <!-- Edificio Name Field -->
            <div class="mb-3">
                {!! Form::label('edificio', 'Edificio:') !!}
                <p>{{ $sala->sector->piso->edif->edif_descripcion ?? 'No asignado' }}</p>
            </div>

            <!-- Piso Name Field -->
            <div class="mb-3">
                {!! Form::label('piso', 'Piso:') !!}
                <p>{{ $sala->sector->piso->piso_descripcion ?? 'No asignado' }}</p>
            </div>

            <!-- Sector Name Field -->
            <div class="mb-3">
                {!! Form::label('sector', 'Sector:') !!}
                <p>{{ $sala->sector->sect_descripcion ?? 'No asignado' }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Información de la Sala -->
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Detalles de la Sala</h5>
        </div>
        <div class="card-body">
            <!-- Tipo de Sala Field -->
            <div class="mb-3">
                {!! Form::label('stip_id', 'Tipo de sala:') !!}
                <p>{{ $sala->stip->stip_descripcion }}</p>
            </div>

            <!-- Dependencia Field -->
            <div class="mb-3">
                {!! Form::label('depe_id', 'Dependencia:') !!}
                <p>{{ $sala->depe->depe_descripcion }}</p>
            </div>

            <!-- Sala Descripcion Field -->
            <div class="mb-3">
                {!! Form::label('sala_descripcion', 'Descripción de la Sala:') !!}
                <p>{{ $sala->sala_descripcion }}</p>
            </div>

            <!-- Sala Direccion Field -->
            <div class="mb-3">
                {!! Form::label('sala_direccion', 'Dirección de la Sala:') !!}
                <p>{{ $sala->sala_direccion }}</p>
            </div>

            <!-- Sala Capacidad Field -->
            <div class="mb-3">
                {!! Form::label('sala_capacidad', 'Capacidad de la Sala:') !!}
                <p>{{ $sala->sala_capacidad }}</p>
            </div>
        </div>
    </div>
</div>
