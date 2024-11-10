<!-- Sala Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_descripcion', 'Descripción de la Sala:', ['for' => 'sala_descripcion']) !!}
    {!! Form::text('sala_descripcion', null, [
    'class' => 'form-control ' . ($errors->has('sala_descripcion') ? 'is-invalid' : (old('sala_descripcion') ? 'is-valid' : '')),
    'id' => 'sala_descripcion',
    'maxlength' => 255
    ]) !!}
    @if ($errors->has('sala_descripcion'))
    <small class="text-danger">
        {{ $errors->first('sala_descripcion') }}
    </small>
    @elseif (old('sala_descripcion'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>

<!-- Sala Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_direccion', 'Dirección de la Sala:', ['for' => 'sala_direccion']) !!}
    {!! Form::text('sala_direccion', null, [
    'class' => 'form-control ' . ($errors->has('sala_direccion') ? 'is-invalid' : (old('sala_direccion') ? 'is-valid' : '')),
    'id' => 'sala_direccion',
    'maxlength' => 255
    ]) !!}
    @if ($errors->has('sala_direccion'))
    <small class="text-danger">
        {{ $errors->first('sala_direccion') }}
    </small>
    @elseif (old('sala_direccion'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>

<!-- Sala Capacidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_capacidad', 'Capacidad de la Sala:', ['for' => 'sala_capacidad']) !!}
    {!! Form::number('sala_capacidad', null, [
        'class' => 'form-control ' . ($errors->has('sala_capacidad') ? 'is-invalid' : (old('sala_capacidad') ? 'is-valid' : '')), 
        'id' => 'sala_capacidad'
    ]) !!}
    @if ($errors->has('sala_capacidad'))
        <small class="text-danger">
            {{ $errors->first('sala_capacidad') }}
        </small>
    @elseif (old('sala_capacidad'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Stip Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stip_id', 'Tipo de sala:', ['for' => 'stip_id']) !!}
    {!! Form::select('stip_id', $salasTipo, null, [
        'class' => 'form-control ' . ($errors->has('stip_id') ? 'is-invalid' : (old('stip_id') ? 'is-valid' : '')), 
        'id' => 'stip_id', 
        'placeholder' => 'Seleccione una opción'
    ]) !!}
    @if ($errors->has('stip_id'))
        <small class="text-danger">
            {{ $errors->first('stip_id') }}
        </small>
    @elseif (old('stip_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Depe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depe_id', 'Dependencia:', ['for' => 'depe_id']) !!}
    {!! Form::select('depe_id', $dependencias, null, [
        'class' => 'form-control ' . ($errors->has('depe_id') ? 'is-invalid' : (old('depe_id') ? 'is-valid' : '')), 
        'id' => 'depe_id', 
        'placeholder' => 'Seleccione una opción'
    ]) !!}
    @if ($errors->has('depe_id'))
        <small class="text-danger">
            {{ $errors->first('depe_id') }}
        </small>
    @elseif (old('depe_id'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>


<!-- Campo de Edificio -->
<div class="form-group col-sm-6">
    {!! Form::label('edificio_id', 'Edificio:', ['for' => 'edificio_id']) !!}
    {!! Form::select('edificio_id', $edificios, $sala->sector->piso->edif_id ?? null, [
    'class' => 'form-control ' . ($errors->has('edificio_id') ? 'is-invalid' : (old('edificio_id') ? 'is-valid' : '')),
    'id' => 'edificio_id',
    'placeholder' => 'Seleccione un Edificio'
    ]) !!}
    @if ($errors->has('edificio_id'))
    <small class="text-danger">
        {{ $errors->first('edificio_id') }}
    </small>
    @elseif (old('edificio_id'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>

<!-- Campo de Piso (dependiente del Edificio) -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_id', 'Piso:', ['for' => 'piso_id']) !!}
    {!! Form::select('piso_id', $pisos ?? [], $sala->sector->piso_id ?? null, [
    'class' => 'form-control ' . ($errors->has('piso_id') ? 'is-invalid' : (old('piso_id') ? 'is-valid' : '')),
    'id' => 'piso_id',
    'placeholder' => 'Seleccione un Piso'
    ]) !!}
    @if ($errors->has('piso_id'))
    <small class="text-danger">
        {{ $errors->first('piso_id') }}
    </small>
    @elseif (old('piso_id'))
    <small class="text-success">
        ¡Se ve bien!
    </small>
    @endif
</div>

<!-- Campo de Sector (dependiente de Piso) -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_id', 'Sector:', ['for' => 'sect_id']) !!}
    {!! Form::select('sect_id', isset($sectoresPorPiso[$sala->piso_id]) ? $sectoresPorPiso[$sala->piso_id] : [], $sala->sect_id ?? null, [
    'class' => 'form-control ' . ($errors->has('sect_id') ? 'is-invalid' : (old('sect_id') ? 'is-valid' : '')),
    'id' => 'sect_id',
    'placeholder' => 'Seleccione un Sector'
    ]) !!}
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



<script>
    $(document).ready(function() {
        // Variables para los valores seleccionados al editar
        let selectedEdificioId = '{{ $sala->sector->piso->edif_id ?? null }}';
        let selectedPisoId = '{{ $sala->sector->piso_id ?? null }}';
        let selectedSectorId = '{{ $sala->sect_id ?? null }}';

        let pisosPorEdificio = @json($pisosPorEdificio);
        let sectoresPorPiso = @json($sectoresPorPiso);

        // Función para cargar los pisos
        function loadPisos(edificioId) {
            let pisoSelect = $('#piso_id');
            pisoSelect.empty().append('<option value="">Seleccione un Piso</option>');

            if (edificioId && pisosPorEdificio[edificioId]) {
                $.each(pisosPorEdificio[edificioId], function(id, descripcion) {
                    pisoSelect.append(`<option value="${id}">${descripcion}</option>`);
                });

                if (selectedPisoId) {
                    pisoSelect.val(selectedPisoId);
                    loadSectores(selectedPisoId); // Llama a loadSectores una vez seleccionado el piso
                    selectedPisoId = null; // Limpia la variable para evitar recargar en cada cambio
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
                    sectorSelect.val(selectedSectorId); // Selecciona el sector
                    selectedSectorId = null; // Limpia la variable para evitar recargar en cada cambio
                }
            }
        }

        // Evento de cambio de Edificio
        $('#edificio_id').change(function() {
            loadPisos($(this).val());
            $('#sect_id').empty().append('<option value="">Seleccione un Sector</option>');
        });

        // Evento de cambio de Piso
        $('#piso_id').change(function() {
            loadSectores($(this).val());
        });

        // Carga inicial
        if (selectedEdificioId) {
            $('#edificio_id').val(selectedEdificioId);
            loadPisos(selectedEdificioId);
        } else if (selectedPisoId) {
            loadSectores(selectedPisoId); // Carga sectores si ya hay un piso seleccionado
        }
    });
</script>