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

        return $dataTable
            ->addColumn('index', function ($transferencia) {
                return $this->getIndex($transferencia);
            })

            ->addColumn('sala_descripcion', function ($transferencia) {
                return $transferencia->sala->sala_descripcion ?? 'Sin tipo de sala';
            })
            ->addColumn('name', function ($transferencia) {
                return $transferencia->usu->name ?? 'Sin usuario';
            })

            ->addColumn('tran_procesado', function ($transferencia) {
                return $transferencia->tran_procesado == 1 ? 'Procesado' : 'Pendiente';
            })

            ->addColumn('action', 'transferencias.datatables_actions');
    }



    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Transferencia $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transferencia $model)
    {
        return $model->newQuery()->with(['sala', 'usu'])->whereNull('deleted_at');
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
                'lengthMenu' => [5, 10, 20, 50, 100],
                'language'   => [
                    'lengthMenu'    => 'Mostrar _MENU_ registros por página',
                    'zeroRecords'   => 'Ninguna transferencia encontrada',
                    'info'          => 'Mostrando de _START_ a _END_ de un total de _TOTAL_ registros',
                    'infoEmpty'     => 'No hay transferencias disponibles',
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
                    ['extend' => 'csv', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'excel', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'colvis', 'className' => 'btn btn-default btn-sm no-corner', 'text' => 'Ver columnas'],
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
            'sala_descripcion' => ['title' => 'Tipo de Sala'],
            'name' => ['title' => 'Usuario'], // Ahora mostramos el nombre del usuario
            'tran_fecha' => ['title' => 'Fecha de transferencia'],
            'tran_procesado' => ['title' => 'Procesado'],
        ];
    }



    protected function getIndex($transferencia)
    {
        // Obtenemos todos los registros activos
        $activeRows = Transferencia::whereNull('deleted_at')->get();

        // Buscamos la posición de la sala actual
        return $activeRows->search(function ($item) use ($transferencia) {
            return $item->getKey() === $transferencia->getKey();
        }) + 1; // +1 porque la numeración debe comenzar en 1
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
