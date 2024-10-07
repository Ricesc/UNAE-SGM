<div class="table-responsive">
    <table class="table" id="ingresos-table">
        <thead>
        <tr>
            <th>Prov Id</th>
        <th>Usu Id</th>
        <th>Ing Fecha Compra</th>
        <th>Ing Costo Total</th>
        <th>Ing Estado</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ingresos as $ingreso)
            <tr>
                <td>{{ $ingreso->prov_id }}</td>
            <td>{{ $ingreso->usu_id }}</td>
            <td>{{ $ingreso->ing_fecha_compra }}</td>
            <td>{{ $ingreso->ing_costo_total }}</td>
            <td>{{ $ingreso->ing_estado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ingresos.destroy', $ingreso->ing_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ingresos.show', [$ingreso->ing_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ingresos.edit', [$ingreso->ing_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
