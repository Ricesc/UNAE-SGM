<div class="table-responsive">
    <table class="table" id="proveedores-table">
        <thead>
        <tr>
            <th>Prov Nombre</th>
        <th>Prov Telefono</th>
        <th>Prov Ruc</th>
        <th>Prov Direccion</th>
        <th>Prov Localidad</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->prov_nombre }}</td>
            <td>{{ $proveedor->prov_telefono }}</td>
            <td>{{ $proveedor->prov_ruc }}</td>
            <td>{{ $proveedor->prov_direccion }}</td>
            <td>{{ $proveedor->prov_localidad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['proveedores.destroy', $proveedor->prov_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proveedores.show', [$proveedor->prov_id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('proveedores.edit', [$proveedor->prov_id]) }}"
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
