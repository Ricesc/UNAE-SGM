<?php

namespace App\DataTables;

use App\Models\BienesSubTipo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class BienesSubTipoDataTable extends DataTable
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
            ->addColumn('index', function ($bienesSubTipo) {
                return $this->getIndex($bienesSubTipo);
            })
            ->addColumn('btip_descripcion', function ($row) {
                return $row->btip->btip_descripcion ?? 'Sin tipo de bien'; // Mostrar la descripción del tipo de bien
            })->addColumn('action', 'bienes_sub_tipos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BienesSubTipo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BienesSubTipo $model)
    {
        return $model->newQuery()->whereNull('deleted_at')->with('btip');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('bienesSubTipo-table')
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
                    'zeroRecords'   => 'Ningún Sub Tipo de bien encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún Sub Tipo de bien encontrado',
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
            'bsti_descripcion' => ['title' => 'Sub Tipo de Bien'],
            'bsti_detalle' => ['title' => 'Detalle'],
            'bsti_costo' => ['title' => 'Costo'],
            'btip_descripcion' => ['title' => 'Tipo de Bien']
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($bienesSubTipo)
    {
        // Obtenemos todos los registros activos
        $activeRows = BienesSubTipo::whereNull('deleted_at')->get();

        // Buscamos la posición del sub tipo de bien actual
        return $activeRows->search(function ($item) use ($bienesSubTipo) {
            return $item->getKey() === $bienesSubTipo->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bienes_sub_tipos_datatable_' . time();
    }
}
