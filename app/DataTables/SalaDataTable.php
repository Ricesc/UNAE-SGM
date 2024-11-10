<?php

namespace App\DataTables;

use App\Models\Sala;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SalaDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable

            ->addColumn('index', function ($sala) {
                return $this->getIndex($sala);
            })

            ->addColumn('sect_descripcion', function ($sala) {
                return $sala->sect_descripcion ?? 'Sin sector';  // Ahora accedemos directamente al campo de la base de datos
            })

            ->addColumn('stip_descripcion', function ($sala) {
                return $sala->stip->stip_descripcion ?? 'Sin tipo de sala';
            })
            ->addColumn('depe_descripcion', function ($sala) {
                return $sala->depe->depe_descripcion ?? 'Sin dependencia';
            })

            ->addColumn('action', 'salas.datatables_actions');
    }

    public function query(Sala $model)
    {
        return $model->newQuery()
            ->leftJoin('sectores', 'sectores.sect_id', '=', 'salas.sect_id')  // Hacer un JOIN con la tabla 'sectores'
            ->select('salas.*',  'sectores.sect_descripcion') // Seleccionar los campos de la sala y el sector
            ->whereNull('salas.deleted_at');
    }



    public function html()
    {
        return $this->builder()
            ->setTableId('salas-table') // Cambia 'salas-table' si deseas otro ID
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Acciones'])
            ->parameters([
                'responsive' => true,
                'columnDefs' => [
                    ['responsivePriority' => 1, 'targets' => 0],
                    ['responsivePriority' => 2, 'targets' => -1],
                ],
                'autoWidth' => false,
                'dom'       => '<"top"lBf>rt<"bottom"ip><"clear">',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'lengthMenu' => [10, 25, 50, 100],
                'language'   => [ // Personalización de los textos en la tabla
                    'lengthMenu'    => 'Mostrar _MENU_ registros por página',
                    'zeroRecords'   => 'Ninguna sala encontrada',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ninguna sala encontrada',
                    'infoFiltered'  => '(filtrados desde _MAX_ registros totales)',
                    'search'        => 'Buscar:',
                    'loadingRecords' => 'Cargando...',
                    'paginate'      => [
                        'first'    => 'Primero',
                        'last'     => 'Último',
                        'next'     => 'Siguiente',
                        'previous' => 'Anterior',
                    ],
                ],
                'buttons'   => [
                    ['extend' => 'csv', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'excel', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner', 'text' => 'Ver columnas'],
                ],
            ]);
    }


    protected function getColumns()
    {
        return [

            'sala_descripcion' => ['title' => 'Sala'],
            'sala_direccion' => ['title' => 'Dirección'],
            'sala_capacidad' => ['title' => 'Capacidad'],
            'sect_descripcion' => ['title' => 'Sector'], // Columna para sector
            'stip_descripcion' => ['title' => 'Tipo'], // Columna para tipo de sala
            'depe_descripcion' => ['title' => 'Dependencia'], // Columna para dependencia
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($sala)
    {
        // Obtenemos todos los registros activos
        $activeRows = Sala::whereNull('deleted_at')->get();

        // Buscamos la posición de la sala actual
        return $activeRows->search(function ($item) use ($sala) {
            return $item->getKey() === $sala->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    protected function filename()
    {
        return 'salas_datatable_' . time();
    }
}
