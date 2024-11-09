<?php

namespace App\DataTables;

use App\Models\Transferencia;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TransferenciaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'transferencias.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Transferencia $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transferencia $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('transferencias-table')
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
                'lengthMenu' => [5,10, 20, 50, 100],
                'language'   => [ // Personalización de los textos en la tabla
                    'lengthMenu'    => 'Mostrar _MENU_ registros por página',
                    'zeroRecords'   => 'Ninguna transferencia encontrada',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'transferencias',
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'sala_id' =>['title'=>'Sala'],
            'usu_id' =>['title'=>'Usuario'],
            'tran_fecha' =>['title'=>'Fecha de transferencia'],
            'tran_procesado' =>['title'=>'Procesado'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'transferencias_datatable_' . time();
    }
}
