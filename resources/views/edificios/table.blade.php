<div class="table-responsive">
    <table class="table" id="edificios-table">
        <thead>
        <tr>
            <th>Edif Descripcion</th>
        <th>Edif Direccion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($edificios as $edificio)
            <tr>
                <td>{{ $edificio->edif_descripcion }}</td>
            <td>{{ $edificio->edif_direccion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['edificios.destroy', $edificio->edif_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('edificios.show', [$edificio->edif_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('edificios.edit', [$edificio->edif_id]) }}"
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
