<div class="table-responsive">
    <table class="table" id="bajas-table">
        <thead>
        <tr>
            <th>Usu Id</th>
        <th>Baja Fecha</th>
        <th>Baja Estado</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bajas as $baja)
            <tr>
                <td>{{ $baja->usu_id }}</td>
            <td>{{ $baja->baja_fecha }}</td>
            <td>{{ $baja->baja_estado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bajas.destroy', $baja->baja_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bajas.show', [$baja->baja_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bajas.edit', [$baja->baja_id]) }}"
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
