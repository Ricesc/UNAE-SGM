<div class="table-responsive">
    <table class="table" id="transferencias-table">
        <thead>
        <tr>
            <th>Sala Id</th>
        <th>Usu Id</th>
        <th>Tran Fecha</th>
        <th>Tran Procesado</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transferencias as $transferencia)
            <tr>
                <td>{{ $transferencia->sala_id }}</td>
            <td>{{ $transferencia->usu_id }}</td>
            <td>{{ $transferencia->tran_fecha }}</td>
            <td>{{ $transferencia->tran_procesado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['transferencias.destroy', $transferencia->tran_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('transferencias.show', [$transferencia->tran_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('transferencias.edit', [$transferencia->tran_id]) }}"
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
