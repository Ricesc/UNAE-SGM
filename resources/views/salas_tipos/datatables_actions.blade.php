{!! Form::open(['route' => ['salasTipos.destroy', $stip_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('salasTipos.show', $stip_id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> Ver
        </a>
        <a href="{{ route('salasTipos.edit', $stip_id) }}" class='dropdown-item'>
            <i class="fa fa-edit"></i> Editar
        </a>
        <div class="dropdown-divider"></div>
        {!! Form::button('<i class="fa fa-trash"></i> Borrar', [
            'type' => 'submit',
            'class' => 'dropdown-item text-danger',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}