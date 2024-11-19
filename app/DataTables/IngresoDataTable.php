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
            ->addColumn('index', function ($ingreso) {
                return $this->getIndex($ingreso);
            })
            ->addColumn('prov_nombre', function ($row) {
                return $row->proveedor->prov_nombre ?? 'Sin proveedor'; // Mostrar el nombre del proveedor
            })
            ->addColumn('name', function ($row) {
                return $row->usu->name ?? 'Sin usuario'; // Mostrar el nombre del usuario responsable
            })
            ->addColumn('ing_estado', function ($row) {
                $badgeClass = $row->ing_estado == 0 ? 'warning' : 'success';
                $badgeText = $row->ing_estado == 0 ? 'Pendiente' : 'Procesado';

                return '<span class="badge badge-' . $badgeClass . '">' . $badgeText . '</span>';
            })
            ->addColumn('ing_fecha_compra', function ($row) {
                return \Carbon\Carbon::parse($row->ing_fecha_compra)->format('d/m/Y');
            })
            ->rawColumns(['ing_estado', 'action']) // Permite HTML en las columnas especificadas
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
        return $model->newQuery()->whereNull('deleted_at')->with('usu', 'proveedor');
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
                'lengthMenu' => [5, 10, 20, 50, 100],
                'language'   => [ // Personalización de los textos en la tabla
                    'lengthMenu'    => 'Mostrar _MENU_ registros por página',
                    'zeroRecords'   => 'Ningún Ingreso encontrado',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'Ningún Ingreso encontrado',
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
            'prov_nombre' => ['title' => 'Proveedor'],
            'name' => ['title' => 'Usuario'],
            'ing_fecha_compra' => ['title' => 'F. Compra'],
            'ing_costo_total' => ['title' => 'C. Total'],
            'ing_estado' => ['title' => 'Estado', 'orderable' => false,  'searchable' => false,]
        ];
    }

    // Método para obtener el índice, contando solo los registros no eliminados
    protected function getIndex($ingreso)
    {
        // Obtenemos todos los registros activos
        $activeRows = Ingreso::whereNull('deleted_at')->get();

        // Buscamos la posición del ingreso actual
        return $activeRows->search(function ($item) use ($ingreso) {
            return $item->getKey() === $ingreso->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
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
