{!! Form::open(['route' => ['proveedores.destroy', $prov_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('proveedores.show', $prov_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('proveedores.edit', $prov_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
