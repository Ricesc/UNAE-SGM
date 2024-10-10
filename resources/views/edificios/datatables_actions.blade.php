{!! Form::open(['route' => ['edificios.destroy', $edif_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('edificios.show', $edif_id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> Ver
        </a>
        <a href="{{ route('edificios.edit', $edif_id) }}" class='dropdown-item'>
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
