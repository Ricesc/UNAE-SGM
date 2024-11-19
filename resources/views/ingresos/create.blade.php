@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Registrar Ingreso</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    <div class="card">
        {!! Form::open(['route' => 'ingresos.store']) !!}

        <div class="card-body">
            <ul class="nav nav-tabs" id="tabIngreso" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="compra-tab" data-toggle="tab" href="#compra" role="tab">
                        <i class="fas fa-shopping-cart"></i> Detalles de la Compra
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="bien-tab" data-toggle="tab" href="#bien" role="tab">
                        <i class="fas fa-box"></i> Detalles del Bien
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ubicacion-tab" data-toggle="tab" href="#ubicacion" role="tab">
                        <i class="fas fa-map-marker-alt"></i> Ubicación
                    </a>
                </li>
            </ul>

            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="compra" role="tabpanel">
                        @include('ingresos.fields', ['section' => 'compra'])
                </div>
                <div class="tab-pane fade" id="bien" role="tabpanel">
                    <div class="row">
                        @include('ingresos.fields', ['section' => 'bien'])
                    </div>
                </div>
                <div class="tab-pane fade" id="ubicacion" role="tabpanel">
                    <div class="row">
                        @include('ingresos.fields', ['section' => 'ubicacion'])
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('ingresos.index') }}" class="btn btn-default">Cancelar</a>
        </div>

        {!! Form::close() !!}
    </div>
</div>
<script>
    function toggleSection(sectionId, selectId, btnId) {
        let section = document.getElementById(sectionId);
        let select = document.getElementById(selectId);
        let button = document.getElementById(btnId);

        if ($(section).hasClass('show')) {
            $(section).collapse('hide');
            select.disabled = false;
            select.value = '';
            button.textContent = '+ Agregar Nuevo';
        } else {
            $(section).collapse('show');
            select.disabled = true;
            select.value = '';
            button.textContent = 'Cancelar';
        }
    }
</script>

<script>
    $(document).ready(function () {
    // Autocomplete para 'Tipo de Bien'
    $('#btip_descripcion').autocomplete({
        minLength: 2, // Inicia después de escribir 2 caracteres
        source: function (request, response) {
            $.ajax({
                url: "{{ route('bienes_tipos.autocomplete') }}",
                type: "GET",
                data: { term: request.term },
                success: function (data) {
                    response(data); // Devuelve las opciones al Autocomplete
                },
            });
        },
        select: function (event, ui) {
            $('#btip_descripcion').val(ui.item.value);
        },
    });

    // Autocomplete para 'Subtipo de Bien'
    $('#bsti_descripcion').autocomplete({
        minLength: 2,
        source: function (request, response) {
            const tipo = $('#btip_descripcion').val();
            if (!tipo) {
                return response([]);
            }
            $.ajax({
                url: "{{ route('bienes_subtipos.autocomplete') }}",
                type: "GET",
                data: { term: request.term, tipo },
                success: function (data) {
                    response(data);
                },
            });
        },
        select: function (event, ui) {
            $('#bsti_descripcion').val(ui.item.value);
        },
    });
});


</script>

<script>
    $(document).ready(function() {
        // Variables para los valores seleccionados al editar
        let selectedEdificioId = '{{ $bien->sala->sector->piso->edif_id ?? null }}';
        let selectedPisoId = '{{ $bien->sala->sector->piso_id ?? null }}';
        let selectedSectorId = '{{ $bien->sala->sect_id ?? null }}';
        let selectedSalaId = '{{ $bien->sala_id ?? null }}';

        let pisosPorEdificio = @json($pisosPorEdificio);
        let sectoresPorPiso = @json($sectoresPorPiso);
        let salasPorSector = @json($salasPorSector);

        // Función para cargar los pisos
        function loadPisos(edificioId) {
            let pisoSelect = $('#piso_id');
            pisoSelect.empty().append('<option value="">Seleccione un Piso</option>');

            if (edificioId && pisosPorEdificio[edificioId]) {
                $.each(pisosPorEdificio[edificioId], function(id, descripcion) {
                    pisoSelect.append('<option value="' + id + '">' + descripcion + '</option>');
                });

                if (selectedPisoId) {
                    pisoSelect.val(selectedPisoId);
                    loadSectores(selectedPisoId);  // Llama a loadSectores una vez seleccionado el piso
                    selectedPisoId = null;  // Limpia la variable para evitar recargar en cada cambio
                }
            }
        }

        // Función para cargar los sectores
        function loadSectores(pisoId) {
            let sectorSelect = $('#sect_id');
            sectorSelect.empty().append('<option value="">Seleccione un Sector</option>');

            if (pisoId && sectoresPorPiso[pisoId]) {
                $.each(sectoresPorPiso[pisoId], function(id, descripcion) {
                    sectorSelect.append('<option value="' + id + '">' + descripcion + '</option>');
                });

                if (selectedSectorId) {
                    sectorSelect.val(selectedSectorId);  // Selecciona el sector
                    loadSalas(selectedSectorId);  // Carga las salas cuando se selecciona un sector
                    selectedSectorId = null;  // Limpia la variable para evitar recargar en cada cambio
                }
            }
        }

        // Función para cargar las salas
        function loadSalas(sectorId) {
            let salaSelect = $('#sala_id');
            salaSelect.empty().append('<option value="">Seleccione una Sala</option>');

            if (sectorId && salasPorSector[sectorId]) {
                $.each(salasPorSector[sectorId], function(id, descripcion) {
                    salaSelect.append('<option value="' + id + '">' + descripcion + '</option>');
                });

                if (selectedSalaId) {
                    salaSelect.val(selectedSalaId);  // Selecciona la sala
                    selectedSalaId = null;  // Limpia la variable para evitar recargar en cada cambio
                }
            }
        }

        // Evento de cambio de Edificio
        $('#edif_id').change(function() {
            loadPisos($(this).val());
            $('#sect_id').empty().append('<option value="">Seleccione un Sector</option>');
            $('#sala_id').empty().append('<option value="">Seleccione una Sala</option>');
        });

        // Evento de cambio de Piso
        $('#piso_id').change(function() {
            loadSectores($(this).val());
            $('#sala_id').empty().append('<option value="">Seleccione una Sala</option>');
        });

        // Evento de cambio de Sector
        $('#sect_id').change(function() {
            loadSalas($(this).val());
        });

        // Carga inicial
        if (selectedEdificioId) {
            $('#edif_id').val(selectedEdificioId);
            loadPisos(selectedEdificioId);
        } else if (selectedPisoId) {
            loadSectores(selectedPisoId);  // Carga sectores si ya hay un piso seleccionado
        } else if (selectedSectorId) {
            loadSalas(selectedSectorId);  // Carga salas si ya hay un sector seleccionado
        }
    });
</script>

    
    
@endsection
