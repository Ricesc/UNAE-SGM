@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Editar Ingreso</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    <div class="card">
        {!! Form::model($ingreso, ['route' => ['ingresos.update', $ingreso->ing_id], 'method' => 'patch']) !!}

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
                    @include('ingresos.fields', [
                        'section' => 'compra',
                        'editMode' => true
                    ])
                </div>
                <div class="tab-pane fade" id="bien" role="tabpanel">
                    <div class="row">
                        @include('ingresos.fields', [
                            'section' => 'bien',
                            'editMode' => true
                        ])
                    </div>
                </div>
                <div class="tab-pane fade" id="ubicacion" role="tabpanel">
                    <div class="row">
                        @include('ingresos.fields', [
                            'section' => 'ubicacion',
                            'editMode' => true
                        ])
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
@endsection
