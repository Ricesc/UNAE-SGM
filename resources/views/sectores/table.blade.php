<div class="table-responsive">
    <table class="table" id="sectores-table">
        <thead>
        <tr>
            <th>Piso Id</th>
        <th>Sect Descripcion</th>
        <th>Sect Direccion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sectores as $sector)
            <tr>
                <td>{{ $sector->piso_id }}</td>
            <td>{{ $sector->sect_descripcion }}</td>
            <td>{{ $sector->sect_direccion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['sectores.destroy', $sector->sect_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sectores.show', [$sector->sect_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sectores.edit', [$sector->sect_id]) }}"
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
