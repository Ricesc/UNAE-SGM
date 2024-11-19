{{-- Section: Detalles de la Compra --}}
@if ($section === 'compra')
    <div class="form-group">
        {!! Form::label('prov_id', 'Proveedor:') !!}
        <div class="input-group">
            {!! Form::select('prov_id', $proveedores, $ingreso->prov_id ?? null, [
                'class' => 'form-control ' . ($errors->has('prov_id') ? 'is-invalid' : (old('prov_id') ? 'is-valid' : '')), 
                'placeholder' => 'Seleccione un proveedor'
            ]) !!}
            <div class="input-group-append">
                <button id="nuevoProveedorBtn" class="btn btn-outline-primary" type="button" onclick="toggleSection('nuevoProveedorForm', 'prov_id', 'nuevoProveedorBtn')">+ Agregar Nuevo</button>
            </div>
        </div>
        @if ($errors->has('prov_id'))
            <small class="text-danger">{{ $errors->first('prov_id') }}</small>
        @elseif (old('prov_id'))
            <small class="text-success">¡Se ve bien!</small>
        @endif
        <!-- Formulario colapsable para nuevo proveedor -->
        <div id="nuevoProveedorForm" class="mt-3 collapse">
            <div class="form-row">
                <div class="col">
                    {!! Form::text('nuevo_prov_nombre', null, [
                        'class' => 'form-control ' . ($errors->has('nuevo_prov_nombre') ? 'is-invalid' : (old('nuevo_prov_nombre') ? 'is-valid' : '')), 
                        'placeholder' => 'Nombre del proveedor'
                    ]) !!}
                    @if ($errors->has('nuevo_prov_nombre'))
                        <small class="text-danger">{{ $errors->first('nuevo_prov_nombre') }}</small>
                    @elseif (old('nuevo_prov_nombre'))
                        <small class="text-success">¡Se ve bien!</small>
                    @endif
                </div>
                <div class="col">
                    {!! Form::text('prov_telefono', null, [
                        'class' => 'form-control' . ($errors->has('prov_telefono') ? 'is-invalid' : (old('prov_telefono') ? 'is-valid' : '')), 
                        'placeholder' => 'Teléfono'
                    ]) !!}
                    @if ($errors->has('prov_telefono'))
                        <small class="text-danger">{{ $errors->first('prov_telefono') }}</small>
                    @elseif (old('prov_telefono'))
                        <small class="text-success">¡Se ve bien!</small>
                    @endif
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col">
                    {!! Form::text('prov_ruc', null, [
                        'class' => 'form-control' . ($errors->has('prov_ruc') ? 'is-invalid' : (old('prov_ruc') ? 'is-valid' : '')), 
                        'placeholder' => 'RUC'
                    ]) !!}
                    @if ($errors->has('prov_ruc'))
                        <small class="text-danger">{{ $errors->first('prov_ruc') }}</small>
                    @elseif(old('prov_ruc'))
                        <small class="text-success">¡Se ve bien!</small>
                    @endif
                </div>
                <div class="col">
                    {!! Form::text('prov_direccion', null, [
                        'class' => 'form-control' . ($errors->has('prov_direccion') ? 'is-invalid' : (old('prov_direccion') ? 'is-valid' : '')), 
                        'placeholder' => 'Dirección'
                    ]) !!}
                    @if ($errors->has('prov_direccion'))
                        <small class="text-danger">{{ $errors->first('prov_direccion') }}</small>
                    @elseif(old('prov_direccion'))
                        <small class="text-success">¡Se ve bien!</small>
                    @endif
                </div>
                <div class="col">
                    {!! Form::text('prov_localidad', null, [
                        'class' => 'form-control' . ($errors->has('prov_localidad') ? 'is-invalid' : (old('prov_localidad') ? 'is-valid' : '')), 
                        'placeholder' => 'Localidad'
                    ]) !!}
                    @if ($errors->has('prov_localidad'))
                        <small class="text-danger">{{ $errors->first('prov_localidad') }}</small>
                    @elseif(old('prov_localidad'))
                        <small class="text-success">¡Se ve bien!</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <!-- Campo Fecha de Compra -->
        <div class="form-group col-md-4">
            {!! Form::label('ing_fecha_compra', 'Fecha de Compra:') !!}
            {!! Form::date(
                'ing_fecha_compra',
                isset($ingreso->ing_fecha_compra) ? $ingreso->ing_fecha_compra : \Carbon\Carbon::now(),
                [
                    'class' => 'form-control ' . ($errors->has('ing_fecha_compra') ? 'is-invalid' : (old('ing_fecha_compra') ? 'is-valid' : '')),
                ]
            ) !!}
            @if ($errors->has('ing_fecha_compra'))
                <small class="text-danger">
                    {{ $errors->first('ing_fecha_compra') }}
                </small>
            @elseif (old('ing_fecha_compra'))
                <small class="text-success">
                    ¡Se ve bien!
                </small>
            @endif
        </div>
    
        <!-- Campo Costo Unitario -->
        <div class="form-group col-md-4">
            {!! Form::label('idet_costo', 'Costo Unitario:') !!}
            {!! Form::number(
                'idet_costo',
                isset($ingreso->IngresosDet) ? $ingreso->IngresosDet->first()->bsti->bsti_costo : null,
                [
                    'class' => 'form-control ' . ($errors->has('idet_costo') ? 'is-invalid' : (old('idet_costo') ? 'is-valid' : '')),
                    'step' => '0.01',
                ]
            ) !!}
            @if ($errors->has('idet_costo'))
                <small class="text-danger">
                    {{ $errors->first('idet_costo') }}
                </small>
            @elseif (old('idet_costo'))
                <small class="text-success">
                    ¡Se ve bien!
                </small>
            @endif
        </div>
    
        <!-- Campo Cantidad -->
        <div class="form-group col-md-4">
            {!! Form::label('idet_cantidad', 'Cantidad:') !!}
            {!! Form::number(
                'idet_cantidad',
                isset($ingreso->IngresosDet) ? $ingreso->IngresosDet->first()->idet_cantidad : 1,
                [
                    'class' => 'form-control ' . ($errors->has('idet_cantidad') ? 'is-invalid' : (old('idet_cantidad') ? 'is-valid' : '')),
                    'min' => 1,
                ]
            ) !!}
            @if ($errors->has('idet_cantidad'))
                <small class="text-danger">
                    {{ $errors->first('idet_cantidad') }}
                </small>
            @elseif (old('idet_cantidad'))
                <small class="text-success">
                    ¡Se ve bien!
                </small>
            @endif
        </div>
    </div>
    
@endif

{{-- Section: Detalles del Bien --}}
@if ($section === 'bien')
    <!-- Tipo de Bien -->
    <div class="form-group col-sm-6">
        {!! Form::label('btip_descripcion', 'Tipo de Bien:') !!}
        {!! Form::text('btip_descripcion', isset($ingreso->IngresosDet) ? $ingreso->IngresosDet->first()->bsti->tipo->btip_descripcion : null, [
            'class' => 'form-control ' . ($errors->has('btip_descripcion') ? 'is-invalid' : (old('btip_descripcion') ? 'is-valid' : '')),
            'id' => 'btip_descripcion',
            'placeholder' => 'Escriba para buscar o crear'
        ]) !!}
        @if ($errors->has('btip_descripcion'))
            <small class="text-danger">{{ $errors->first('btip_descripcion') }}</small>
        @elseif (old('btip_descripcion'))
            <small class="text-success">¡Se ve bien!</small>
        @endif
    </div>

    <!-- Subtipo de Bien -->
    <div class="form-group col-sm-6">
        {!! Form::label('bsti_descripcion', 'Subtipo de Bien:') !!}
        {!! Form::text('bsti_descripcion', isset($ingreso->IngresosDet) ? $ingreso->IngresosDet->first()->bsti->bsti_descripcion : null, [
            'class' => 'form-control ' . ($errors->has('bsti_descripcion') ? 'is-invalid' : (old('bsti_descripcion') ? 'is-valid' : '')),
            'id' => 'bsti_descripcion',
            'placeholder' => 'Escriba para buscar o crear'
        ]) !!}
        @if ($errors->has('bsti_descripcion'))
            <small class="text-danger">{{ $errors->first('bsti_descripcion') }}</small>
        @elseif (old('bsti_descripcion'))
            <small class="text-success">¡Se ve bien!</small>
        @endif
    </div>
@endif

{{-- Section: Ubicación del Bien --}}
@if ($section === 'ubicacion')
{{-- Campo de Edificio --}}
<div class="form-group col-sm-6">
    {!! Form::label('edif_id', 'Edificio:') !!}
    {!! Form::select('edif_id', $edificios, $edificioSeleccionado->edif_id ?? null, [
        'class' => 'form-control ' . ($errors->has('edif_id') ? 'is-invalid' : (old('edif_id') ? 'is-valid' : '')),
        'placeholder' => 'Seleccione un Edificio'
    ]) !!}
    @if ($errors->has('edif_id'))
        <small class="text-danger">{{ $errors->first('edif_id') }}</small>
    @elseif (old('edif_id'))
        <small class="text-success">¡Se ve bien!</small>
    @endif
</div>
{{-- Campo de Piso --}}
<div class="form-group col-sm-6">
    {!! Form::label('piso_id', 'Piso:') !!}
    {!! Form::select('piso_id', $pisosPorEdificio[$edificioSeleccionado->edif_id ?? ''] ?? [], $pisoSeleccionado->piso_id ?? null, [
        'class' => 'form-control ' . ($errors->has('piso_id') ? 'is-invalid' : (old('piso_id') ? 'is-valid' : '')),
        'placeholder' => 'Seleccione un Piso'
    ]) !!}
    @if ($errors->has('piso_id'))
        <small class="text-danger">{{ $errors->first('piso_id') }}</small>
    @elseif (old('piso_id'))
        <small class="text-success">¡Se ve bien!</small>
    @endif
</div>

{{-- Campo de Sector --}}
<div class="form-group col-sm-6">
    {!! Form::label('sect_id', 'Sector:') !!}
    {!! Form::select(
        'sect_id',
        $sectoresPorPiso[$pisoSeleccionado->piso_id ?? ''] ?? [],
        $sectorSeleccionado->sect_id ?? null,
        [
            'class' => 'form-control ' . ($errors->has('sect_id') ? 'is-invalid' : (old('sect_id') ? 'is-valid' : '')),
            'placeholder' => 'Seleccione un Sector',
        ]
    ) !!}
    @if ($errors->has('sect_id'))
        <small class="text-danger">
            {{ $errors->first('sect_id') }}
        </small>
    @elseif (old('sect_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

{{-- Campo de Sala --}}
<div class="form-group col-sm-6">
    {!! Form::label('sala_id', 'Sala:') !!}
    {!! Form::select(
        'sala_id',
        $salasPorSector[$sectorSeleccionado->sect_id ?? ''] ?? [],
        $salaSeleccionada->sala_id ?? null,
        [
            'class' => 'form-control ' . ($errors->has('sala_id') ? 'is-invalid' : (old('sala_id') ? 'is-valid' : '')),
            'placeholder' => 'Seleccione una Sala',
        ]
    ) !!}
    @if ($errors->has('sala_id'))
        <small class="text-danger">
            {{ $errors->first('sala_id') }}
        </small>
    @elseif (old('sala_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

@endif

<script>
    $(document).ready(function() {
        // Variables iniciales
        let selectedEdificioId = '{{ $edificio->edif_id ?? null }}';
        let selectedPisoId = '{{ $piso->piso_id ?? null }}';
        let selectedSectorId = '{{ $sector->sect_id ?? null }}';
        let selectedSalaId = '{{ $sala->sala_id ?? null }}';

        let pisosPorEdificio = @json($pisosPorEdificio);
        let sectoresPorPiso = @json($sectoresPorPiso);
        let salasPorSector = @json($salasPorSector);

        // Función para cargar los pisos
        function loadPisos(edificioId) {
            let pisoSelect = $('#piso_id');
            pisoSelect.empty().append('<option value="">Seleccione un Piso</option>');

            if (edificioId && pisosPorEdificio[edificioId]) {
                $.each(pisosPorEdificio[edificioId], function(id, descripcion) {
                    pisoSelect.append(`<option value="${id}">${descripcion}</option>`);
                });

                if (selectedPisoId) {
                    pisoSelect.val(selectedPisoId).trigger('change');
                    selectedPisoId = null;
                }
            }
        }

        // Función para cargar los sectores
        function loadSectores(pisoId) {
            let sectorSelect = $('#sect_id');
            sectorSelect.empty().append('<option value="">Seleccione un Sector</option>');

            if (pisoId && sectoresPorPiso[pisoId]) {
                $.each(sectoresPorPiso[pisoId], function(id, descripcion) {
                    sectorSelect.append(`<option value="${id}">${descripcion}</option>`);
                });

                if (selectedSectorId) {
                    sectorSelect.val(selectedSectorId).trigger('change');
                    selectedSectorId = null;
                }
            }
        }

        // Función para cargar las salas
        function loadSalas(sectorId) {
            let salaSelect = $('#sala_id');
            salaSelect.empty().append('<option value="">Seleccione una Sala</option>');

            if (sectorId && salasPorSector[sectorId]) {
                $.each(salasPorSector[sectorId], function(id, descripcion) {
                    salaSelect.append(`<option value="${id}">${descripcion}</option>`);
                });

                if (selectedSalaId) {
                    salaSelect.val(selectedSalaId);
                    selectedSalaId = null;
                }
            }
        }

        // Eventos de cambio
        $('#edif_id').change(function() {
            loadPisos($(this).val());
            $('#sect_id').empty().append('<option value="">Seleccione un Sector</option>');
            $('#sala_id').empty().append('<option value="">Seleccione una Sala</option>');
        });

        $('#piso_id').change(function() {
            loadSectores($(this).val());
            $('#sala_id').empty().append('<option value="">Seleccione una Sala</option>');
        });

        $('#sect_id').change(function() {
            loadSalas($(this).val());
        });

        // Carga inicial
        if (selectedEdificioId) {
            $('#edif_id').val(selectedEdificioId).trigger('change');
        }
    });
</script>