<div class="table-responsive">
    <table class="table" id="bienes-table">
        <thead>
        <tr>
            <th>Btip Id</th>
        <th>Sala Id</th>
        <th>Idet Id</th>
        <th>Bien Estado</th>
        <th>Bien Codigo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bienes as $bien)
            <tr>
                <td>{{ $bien->btip_id }}</td>
            <td>{{ $bien->sala_id }}</td>
            <td>{{ $bien->idet_id }}</td>
            <td>{{ $bien->bien_estado }}</td>
            <td>{{ $bien->bien_codigo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bienes.destroy', $bien->bien_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bienes.show', [$bien->bien_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bienes.edit', [$bien->bien_id]) }}"
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
