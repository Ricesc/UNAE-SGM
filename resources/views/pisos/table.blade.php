<div class="table-responsive">
    <table class="table" id="pisos-table">
        <thead>
        <tr>
            <th>Edif Id</th>
        <th>Piso Descripcion</th>
        <th>Piso Direccion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pisos as $piso)
            <tr>
                <td>{{ $piso->edif_id }}</td>
            <td>{{ $piso->piso_descripcion }}</td>
            <td>{{ $piso->piso_direccion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pisos.destroy', $piso->piso_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pisos.show', [$piso->piso_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pisos.edit', [$piso->piso_id]) }}"
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
