{!! Form::open(['route' => ['usuarios.destroy', $usu_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('usuarios.show', $usu_id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> View
        </a>
        <a href="{{ route('usuarios.edit', $usu_id) }}" class='dropdown-item'>
            <i class="fa fa-edit"></i> Edit 
        </a>
        <div class="dropdown-divider"></div>
        {!! Form::button('<i class="fa fa-trash"></i> Delete', [
            'type' => 'submit',
            'class' => 'dropdown-item text-danger',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    </div>
</div>
{!! Form::close() !!}
