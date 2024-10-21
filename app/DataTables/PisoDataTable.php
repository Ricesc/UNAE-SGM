<?php

namespace App\DataTables;

use App\Models\Piso;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PisoDataTable extends DataTable
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
            ->addColumn('index', function ($piso) {
                return $this->getIndex($piso);
            })
            ->addColumn('edif_descripcion', function ($row) {
                return $row->edif->edif_descripcion ?? 'Sin edificio'; // Mostrar la descripción del edificio
            })
            ->addColumn('action', 'pisos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Piso $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Piso $model)
    {
        return $model->newQuery()->whereNull('deleted_at')->with('edif');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('pisos-table')
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
                    'zeroRecords'   => 'Ningún Piso encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún Piso encontrado',
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
            'piso_descripcion' => ['title' => 'Descripción'],
            'piso_direccion' => ['title' => 'Dirección'],
            'edif_descripcion' => ['title' => 'Edificio'] // Columna personalizada para mostrar el edificio
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($piso)
    {
        // Obtenemos todos los registros activos
        $activeRows = Piso::whereNull('deleted_at')->get();

        // Buscamos la posición del piso actual
        return $activeRows->search(function ($item) use ($piso) {
            return $item->getKey() === $piso->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pisos_datatable_' . time();
    }
}
