@extends('layouts.app')

@section('content')
    <!-- Encabezado de la sección -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalles del Ingreso</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right" href="{{ route('ingresos.index') }}">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal -->
    <div class="content px-3">
        @include('flash::message')
        <!-- Detalles del Ingreso -->
        <div class="card">
            <div class="card-header">
                <h4>Información del Ingreso</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('ingresos.show_fields')
                </div>
            </div>
        </div>

        <!-- Bienes Ingresados -->
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Bienes Ingresados</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Tipo</th>
                                <th>Sub Tipo</th>
                                <th>Edificio</th>
                                <th>Sala</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ingreso->ingresosDet as $detalle)
                                @foreach ($detalle->bien as $bien)
                                    <tr>
                                        <td>{{ $bien->bien_codigo }}</td>
                                        <td>{{ $bien->subTipo->tipo->btip_descripcion }}</td>
                                        <td>{{ $bien->subTipo->bsti_descripcion }}</td>
                                        <td>{{ $bien->sala->sector->piso->edif->edif_descripcion }}</td>
                                        <td>{{ $bien->sala->sala_descripcion }}</td>
                                        <td>
                                            <span class="badge badge-{{ $bien->bien_estado == 0 ? 'warning' : 'success' }}">
                                                {{ $bien->bien_estado == 0 ? 'Pendiente' : 'Procesado' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
