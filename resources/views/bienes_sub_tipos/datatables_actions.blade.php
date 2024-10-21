{!! Form::open(['route' => ['bienesSubTipos.destroy', $bsti_id], 'method' => 'delete', 'class' => 'd-inline', 'id' => 'delete-form-' . $bsti_id]) !!}
<div class='btn-group'>
    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Acciones
    </button>
    <div class="dropdown-menu">
        <a href="{{ route('bienesSubTipos.show', $bsti_id) }}" class='dropdown-item'>
            <i class="fa fa-eye"></i> Ver
        </a>
        <a href="{{ route('bienesSubTipos.edit', $bsti_id) }}" class='dropdown-item'>
            <i class="fa fa-edit"></i> Editar 
        </a>
        <div class="dropdown-divider"></div>
        <button type="button" class="dropdown-item text-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $bsti_id }}">
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
            var bstiId = button.data('id'); // Extraer el ID del sub tipo de bien
            var formId = '#delete-form-' + bstiId; // Construir el ID del formulario

            // Cuando se haga clic en el botón de confirmación
            $('#confirmDelete').off('click').on('click', function() {
                $(formId).submit(); // Enviar el formulario
            });
        });
    });
</script>