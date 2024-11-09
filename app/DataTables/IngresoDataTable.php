<?php

namespace App\DataTables;

use App\Models\Ingreso;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class IngresoDataTable extends DataTable
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
            ->addColumn('prov_nombre', function ($ingreso) {
                // Eliminar o comentar la línea de depuración
                // dd($ingreso->prov); 
                return $ingreso->prov ? $ingreso->prov->prov_nombre : 'Sin Proveedor';
            })
            ->addColumn('name', function ($ingreso) {
                // Eliminar o comentar la línea de depuración
                // dd($ingreso->usu); 
                return $ingreso->usu ? $ingreso->usu->name : 'Sin Usuario';
            })
            ->addColumn('action', 'ingresos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ingreso $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ingreso $model)
    {
        return $model->newQuery()->with(['usu', 'prov'])->whereNull('deleted_at');
    }


    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('ingresos-table')
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
                    'zeroRecords'   => 'Ningún Ingreso encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún ingreso encontrado',
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
            ['data' => 'prov_id', 'title' => 'Proveedor'], // Mantén los IDs de las relaciones
            ['data' => 'usu_id', 'title' => 'Usuario'], // Mantén los IDs de las relaciones
            ['data' => 'ing_fecha_compra', 'title' => 'Fecha de Compra'],
            ['data' => 'ing_costo_total', 'title' => 'Costo Total'],
            ['data' => 'ing_estado', 'title' => 'Estado']
        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ingresos_datatable_' . time();
    }
}
