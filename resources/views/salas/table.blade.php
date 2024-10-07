<div class="table-responsive">
    <table class="table" id="salas-table">
        <thead>
        <tr>
            <th>Sect Id</th>
        <th>Stip Id</th>
        <th>Depe Id</th>
        <th>Sala Descripcion</th>
        <th>Sala Direccion</th>
        <th>Sala Capacidad</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salas as $sala)
            <tr>
                <td>{{ $sala->sect_id }}</td>
            <td>{{ $sala->stip_id }}</td>
            <td>{{ $sala->depe_id }}</td>
            <td>{{ $sala->sala_descripcion }}</td>
            <td>{{ $sala->sala_direccion }}</td>
            <td>{{ $sala->sala_capacidad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['salas.destroy', $sala->sala_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('salas.show', [$sala->sala_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('salas.edit', [$sala->sala_id]) }}"
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
