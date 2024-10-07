<div class="table-responsive">
    <table class="table" id="salasTipos-table">
        <thead>
        <tr>
            <th>Stip Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salasTipos as $salasTipo)
            <tr>
                <td>{{ $salasTipo->stip_descripcion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['salasTipos.destroy', $salasTipo->stip_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('salasTipos.show', [$salasTipo->stip_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('salasTipos.edit', [$salasTipo->stip_id]) }}"
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
