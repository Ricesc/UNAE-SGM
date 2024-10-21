{!! Form::open(['route' => ['sectores.destroy', $sect_id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('sectores.show', $sect_id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> Ver
        </a>
        <a href="{{ route('sectores.edit', $sect_id) }}" class='dropdown-item'>
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


{{-- wweweweweweweewew --}}

{!! Form::open(['route' => ['sectores.destroy', $sect_id], 'method' => 'delete', 'class' => 'd-inline', 'id' => 'delete-form-' . $sect_id]) !!}
<div class='btn-group'>
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('sectores.show', $sect_id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> Ver
        </a>
        <a href="{{ route('sectores.edit', $sect_id) }}" class='dropdown-item'>
            <i class="fa fa-edit"></i> Editar 
        </a>
        <div class="dropdown-divider"></div>
        <button type="button" class="dropdown-item text-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $sect_id }}">
            <i class="fa fa-trash"></i> Borrar
        </button>
    </div>
</div>
{!! Form::close() !!}
<script>
    $(document).ready(function() {
        // Mostrar el modal y guardar el ID del formulario
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Botón que abrió el modal
            var sectId = button.data('id'); // Extraer el ID del sector
            var formId = '#delete-form-' + sectId; // Construir el ID del formulario

            // Cuando se haga clic en el botón de confirmación
            $('#confirmDelete').off('click').on('click', function() {
                $(formId).submit(); // Enviar el formulario
            });
        });
    });
</script>