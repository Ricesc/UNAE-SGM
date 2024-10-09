{!! Form::open(['route' => ['bienesTipos.destroy', $btip_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('bienesTipos.show', $btip_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('bienesTipos.edit', $btip_id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
