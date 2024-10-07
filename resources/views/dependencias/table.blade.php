<div class="table-responsive">
    <table class="table" id="dependencias-table">
        <thead>
        <tr>
            <th>Depe Descripcion</th>
        <th>Depe Telefono</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dependencias as $dependencia)
            <tr>
                <td>{{ $dependencia->depe_descripcion }}</td>
            <td>{{ $dependencia->depe_telefono }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['dependencias.destroy', $dependencia->depe_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('dependencias.show', [$dependencia->depe_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('dependencias.edit', [$dependencia->depe_id]) }}"
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
