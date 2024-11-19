@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión de Estados - Ingreso #{{ $ingreso->ing_id }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-default" href="{{ route('ingresos.index') }}">Volver</a>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <form id="estadoForm" action="{{ route('ingresos.actualizar-estados', $ingreso->ing_id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h4>Bienes en Ingreso</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Mostrar Detalles</th>
                                    <th>Código</th>
                                    <th>Sala</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ingreso->ingresosDet as $detalle)
                                    @foreach ($detalle->bien as $bien)
                                        <tr>
                                            <td>
                                                <a href="{{ route('bienes.show', $bien->bien_id) }}" class='btn btn-outline-info'>
                                                    <i class="fa fa-eye"></i> Ver
                                                </a>
                                            </td>
                                            <td>{{ $bien->bien_codigo }}</td>
                                            <td>{{ $bien->sala->sala_descripcion }}</td>
                                            <td>
                                                @if ($bien->bien_estado == 2)
                                                    <span class="badge badge-secondary">Dado de Baja</span>
                                                @else
                                                    <select name="bienes[{{ $bien->bien_id }}]" class="form-control custom-select">
                                                        <option value="0" {{ $bien->bien_estado == 0 ? 'selected' : '' }} class="text-warning">Pendiente</option>
                                                        <option value="1" {{ $bien->bien_estado == 1 ? 'selected' : '' }} class="text-success">Procesado</option>
                                                    </select>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Trigger Modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal">
                        Guardar Cambios
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Guardado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas guardar los cambios en los estados de los bienes?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="submitFormButton">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('submitFormButton').addEventListener('click', function () {
            document.getElementById('estadoForm').submit();
        });
    </script>
@endsection

