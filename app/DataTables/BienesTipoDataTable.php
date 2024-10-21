<?php

namespace App\DataTables;

use App\Models\BienesTipo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BienesTipoDataTable extends DataTable
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

        return $dataTable
            ->addColumn('index', function ($bienesTipo) {
                return $this->getIndex($bienesTipo);
            })
            ->addColumn('bsti_descripcion', function ($row) {
                return $row->bsti->bsti_descripcion ?? 'Sin sub tipo de bien'; // Mostrar la descripción del sub tipo de bien
            })->addColumn('action', 'bienes_tipos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BienesTipo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BienesTipo $model)
    {
        return $model->newQuery()->whereNull('deleted_at')->with('bsti');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('bienesTipo-table')
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
                'lengthMenu' => [5, 10, 20, 50, 100],
                'language'   => [ // Personalización de los textos en la tabla
                    'lengthMenu'    => 'Mostrar _MENU_ registros por página',
                    'zeroRecords'   => 'Ningún Tipo de bien encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún Tipo de bien encontrado',
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
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'btip_descripcion' => ['title' => 'Descripción'],
            'btip_detalle' => ['title' => 'Detalle'],
            'btip_costo' => ['title' => 'Costo'],
            'bsti_id' => ['title' => 'Sub Tipo de Bien']
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($bienesTipo)
    {
        // Obtenemos todos los registros activos
        $activeRows = BienesTipo::whereNull('deleted_at')->get();

        // Buscamos la posición del tipo de bien actual
        return $activeRows->search(function ($item) use ($bienesTipo) {
            return $item->getKey() === $bienesTipo->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bienes_tipos_datatable_' . time();
    }
}
