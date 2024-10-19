{{-- Agrupación de Bienes --}}
<li class="nav-header">Bienes</li>
<li class="nav-item has-treeview {{ Request::is('bienes*') || Request::is('bienesTipos*') || Request::is('bienesSubTipos*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('bienes*') || Request::is('bienesTipos*') || Request::is('bienesSubTipos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-box"></i>
        <p>
            Bienes
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ Request::is('bienes*') || Request::is('bienesTipos*') || Request::is('bienesSubTipos*') ? 'display: block;' : 'display: none;' }}">
        <li class="nav-item">
            <a href="{{ route('bienes.index') }}" class="nav-link {{ Request::is('bienes*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Bienes</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('bienesTipos.index') }}" class="nav-link {{ Request::is('bienesTipos*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Bienes Tipos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('bienesSubTipos.index') }}" class="nav-link {{ Request::is('bienesSubTipos*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Bienes Sub Tipos</p>
            </a>
        </li>
    </ul>
</li>

{{-- Sin Agrupar --}}
<li class="nav-header">Acciones</li>
<li class="nav-item">
    <a href="{{ route('ingresos.index') }}" class="nav-link {{ Request::is('ingresos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus-circle"></i>
        <p>Ingresos</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('transferencias.index') }}" class="nav-link {{ Request::is('transferencias*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-exchange-alt"></i>
        <p>Transferencias</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('bajas.index') }}" class="nav-link {{ Request::is('bajas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-trash"></i>
        <p>Bajas</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('proveedores.index') }}" class="nav-link {{ Request::is('proveedores*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-truck"></i>
        <p>Proveedores</p>
    </a>
</li>

{{-- Agrupación de Parámetros de Administrador --}}
<li class="nav-header">Parámetros de Administrador</li>
<li class="nav-item has-treeview {{ Request::is('users*') || Request::is('edificios*') || Request::is('pisos*') || Request::is('sectores*') || Request::is('salasTipos*') || Request::is('salas*') || Request::is('dependencias*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('users*') || Request::is('edificios*') || Request::is('pisos*') || Request::is('sectores*') || Request::is('salasTipos*') || Request::is('salas*') || Request::is('dependencias*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
            Parámetros
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ Request::is('users*') || Request::is('edificios*') || Request::is('pisos*') || Request::is('sectores*') || Request::is('salasTipos*') || Request::is('salas*') || Request::is('dependencias*') ? 'display: block;' : 'display: none;' }}">
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Usuarios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('edificios.index') }}" class="nav-link {{ Request::is('edificios*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Edificios</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pisos.index') }}" class="nav-link {{ Request::is('pisos*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Pisos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('sectores.index') }}" class="nav-link {{ Request::is('sectores*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sectores</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salasTipos.index') }}" class="nav-link {{ Request::is('salasTipos*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salas Tipos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('salas.index') }}" class="nav-link {{ Request::is('salas*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dependencias.index') }}" class="nav-link {{ Request::is('dependencias*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Dependencias</p>
            </a>
        </li>
    </ul>
</li>
