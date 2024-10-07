<div class="table-responsive">
    <table class="table" id="bienesSubTipos-table">
        <thead>
        <tr>
            <th>Bsti Descripcion</th>
        <th>Bsti Detalle</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bienesSubTipos as $bienesSubTipo)
            <tr>
                <td>{{ $bienesSubTipo->bsti_descripcion }}</td>
            <td>{{ $bienesSubTipo->bsti_detalle }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['bienesSubTipos.destroy', $bienesSubTipo->bsti_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bienesSubTipos.show', [$bienesSubTipo->bsti_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('bienesSubTipos.edit', [$bienesSubTipo->bsti_id]) }}"
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
