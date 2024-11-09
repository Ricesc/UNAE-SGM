<?php

namespace App\DataTables;

use App\Models\Dependencia;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DependenciaDataTable extends DataTable
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

        // Agregar columna de índice
        return $dataTable
            ->addColumn('index', function ($dependencia) {
                return $this->getIndex($dependencia);
            })->addColumn('action', 'dependencias.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Dependencia $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Dependencia $model)
    {
        // Filtrar solo registros activos (sin soft delete)
        return $model->newQuery()->whereNull('deleted_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('dependencias-table')
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
                    'zeroRecords'   => 'Ningúna Dependencia encontrada',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningúna Dependencia encontrada',
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
            ['data' => 'index', 'title' => '#'], // Columna para numeración
            'depe_descripcion' => ['title' => 'Dependencia'],
            'depe_telefono' => ['title' => 'Teléfono']
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($dependencia)
    {
        // Obtenemos todos los registros activos
        $activeRows = Dependencia::whereNull('deleted_at')->get();
        // Buscamos la posición de la dependencia
        return $activeRows->search(function ($item) use ($dependencia) {
            return $item->getKey() === $dependencia->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dependencias_datatable_' . time();
    }
}
