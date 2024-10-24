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
        return $dataTable->addColumn('action', 'salas.datatables_actions');
    }

    public function query(Sala $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            'sect_id' => ['title' => 'ID del Sector'],
            'stip_id' => ['title' => 'ID del Tipo de Sala'],
            'depe_id' => ['title' => 'ID de Dependencia'],
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
