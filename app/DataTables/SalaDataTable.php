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
            ->addColumn('sect_descripcion', function ($sala) {
                return $sala->sect->sect_descripcion ?? 'Sin sector';
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
        return $model->newQuery()->with(['sect', 'stip', 'depe'])->whereNull('deleted_at');
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
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner', 'text'=>'Ver columnas'],
                ],
            ]);
    }


    protected function getColumns()
    {
        return [
            'sect_descripcion' => ['title' => 'Descripción del Sector'],
            'stip_descripcion' => ['title' => 'Descripción del Tipo de Sala'],
            'depe_descripcion' => ['title' => 'Descripción de la Dependencia'],
            'sala_descripcion' => ['title' => 'Descripción de la Sala'],
            'sala_direccion' => ['title' => 'Dirección de la Sala'],
            'sala_capacidad' => ['title' => 'Capacidad de la Sala'],
        ];
    }

    protected function filename()
    {
        return 'salas_datatable_' . time();
    }
}
