<?php

namespace App\DataTables;

use App\Models\Edificio;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;


class EdificioDataTable extends DataTable
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
            ->addColumn('index', function ($edificio) {
                return $this->getIndex($edificio);
            })
            ->addColumn('action', 'edificios.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Edificio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Edificio $model)
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
            ->setTableId('edificios-table')
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
                    'zeroRecords'   => 'Ningún Edificio encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún Edificio encontrado',
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
            'edif_descripcion' => ['title' => 'Edificio'],
            'edif_direccion' => ['title' => 'Dirección'],
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($edificio)
    {
        // Obtenemos todos los registros activos
        $activeRows = Edificio::whereNull('deleted_at')->get();

        // Buscamos la posición del edificio actual
        return $activeRows->search(function ($item) use ($edificio) {
            return $item->getKey() === $edificio->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'edificios_datatable_' . time();
    }
}
