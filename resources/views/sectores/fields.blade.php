<!-- Sect Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_descripcion', 'Descripción:', ['for' => 'sect_descripcion']) !!}
    {!! Form::text('sect_descripcion', null, [
        'class' => 'form-control ' . ($errors->has('sect_descripcion') ? 'is-invalid' : (old('sect_descripcion') ? 'is-valid' : '')), 
        'id' => 'sect_descripcion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('sect_descripcion'))
        <small class="text-danger">
            {{ $errors->first('sect_descripcion') }}
        </small>
    @elseif (old('sect_descripcion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Sect Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sect_direccion', 'Dirección:', ['for' => 'sect_direccion']) !!}
    {!! Form::text('sect_direccion', null, [
        'class' => 'form-control ' . ($errors->has('sect_direccion') ? 'is-invalid' : (old('sect_direccion') ? 'is-valid' : '')), 
        'id' => 'sect_direccion',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('sect_direccion'))
        <small class="text-danger">
            {{ $errors->first('sect_direccion') }}
        </small>
    @elseif (old('sect_direccion'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Edificio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('edificio_id', 'Edificio:', ['for' => 'edificio_id']) !!}
    {!! Form::select('edificio_id', $edificios, $sector->piso->edif_id ?? null, [
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

<!-- Piso Id Field (dependiente del Edificio) -->
<div class="form-group col-sm-6">
    {!! Form::label('piso_id', 'Piso:', ['for' => 'piso_id']) !!}
    {!! Form::select('piso_id', $pisos ?? [], $sector->piso_id ?? null, [
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

<script>
    $(document).ready(function() {
        let selectedPisoId = '{{ $sector->piso_id ?? null }}';
        let selectedEdificioId = '{{ $sector->piso->edif_id ?? null }}';

        // Cargar los pisos por cada edificio y almacenarlos en un objeto
        let pisosPorEdificio = @json($pisosPorEdificio); // Este es el objeto que se pasará desde el controlador

        // Función para cargar los pisos de un edificio específico
        function loadPisos(edificioId) {
            let pisoSelect = $('#piso_id');
            pisoSelect.empty().append('<option value="">Seleccione un Piso</option>');

            if (edificioId && pisosPorEdificio[edificioId]) {
                // Agregar los pisos al select
                $.each(pisosPorEdificio[edificioId], function(id, descripcion) {
                    pisoSelect.append(`<option value="${id}">${descripcion}</option>`);
                });

                // Seleccionar el piso si estamos en la vista de edición
                if (selectedPisoId) {
                    pisoSelect.val(selectedPisoId);
                    selectedPisoId = null; // Limpiar para futuras cargas
                }
            }
        }

        // Evento al cambiar de edificio
        $('#edificio_id').change(function() {
            loadPisos($(this).val());
        });

        // Cargar pisos si ya hay un edificio seleccionado al entrar en la página
        if (selectedEdificioId) {
            $('#edificio_id').val(selectedEdificioId);
            loadPisos(selectedEdificioId);
        }
    });
</script>
