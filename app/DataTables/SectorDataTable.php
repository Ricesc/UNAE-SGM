<?php

namespace App\DataTables;

use App\Models\Sector;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SectorDataTable extends DataTable
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
            ->addColumn('index', function ($sector) {
                return $this->getIndex($sector);
            })
            ->addColumn('piso_descripcion', function ($row) {
                return $row->piso->piso_descripcion ?? 'Sin piso'; // Mostrar la descripción del piso
            })->addColumn('action', 'sectores.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Sector $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Sector $model)
    {
        return $model->newQuery()->whereNull('deleted_at')->with('piso');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('sectores-table')
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
                    'zeroRecords'   => 'Ningún Sector encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún Sector encontrado',
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
            'sect_descripcion' => ['title' => 'Descripción'],
            'sect_direccion' => ['title' => 'Dirección'],
            'piso_descripcion' => ['title' => 'Piso'] // Columna personalizada para mostrar el piso
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($sector)
    {
        // Obtenemos todos los registros activos
        $activeRows = Sector::whereNull('deleted_at')->get();

        // Buscamos la posición del sector actual
        return $activeRows->search(function ($item) use ($sector) {
            return $item->getKey() === $sector->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sectores_datatable_' . time();
    }
}
