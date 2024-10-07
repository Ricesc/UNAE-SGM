<div class="table-responsive">
    <table class="table" id="bienesTipos-table">
        <thead>
        <tr>
            <th>Bsti Id</th>
        <th>Btip Descripcion</th>
        <th>Btip Detalle</th>
        <th>Btip Costo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bienesTipos as $bienesTipo)
            <tr>
                <td>{{ $bienesTipo->bsti_id }}</td>
            <td>{{ $bienesTipo->btip_descripcion }}</td>
            <td>{{ $bienesTipo->btip_detalle }}</td>
            <td>{{ $bienesTipo->btip_costo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bienesTipos.destroy', $bienesTipo->btip_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bienesTipos.show', [$bienesTipo->btip_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bienesTipos.edit', [$bienesTipo->btip_id]) }}"
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
