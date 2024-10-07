<li class="nav-item">
    <a href="{{ route('sectores.index') }}"
       class="nav-link {{ Request::is('sectores*') ? 'active' : '' }}">
        <p>Sectores</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('edificios.index') }}"
       class="nav-link {{ Request::is('edificios*') ? 'active' : '' }}">
        <p>Edificios</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('pisos.index') }}"
       class="nav-link {{ Request::is('pisos*') ? 'active' : '' }}">
        <p>Pisos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('salas.index') }}"
       class="nav-link {{ Request::is('salas*') ? 'active' : '' }}">
        <p>Salas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('salasTipos.index') }}"
       class="nav-link {{ Request::is('salasTipos*') ? 'active' : '' }}">
        <p>Salas Tipos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('dependencias.index') }}"
       class="nav-link {{ Request::is('dependencias*') ? 'active' : '' }}">
        <p>Dependencias</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('transferencias.index') }}"
       class="nav-link {{ Request::is('transferencias*') ? 'active' : '' }}">
        <p>Transferencias</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bajas.index') }}"
       class="nav-link {{ Request::is('bajas*') ? 'active' : '' }}">
        <p>Bajas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bienes.index') }}"
       class="nav-link {{ Request::is('bienes*') ? 'active' : '' }}">
        <p>Bienes</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('ingresos.index') }}"
       class="nav-link {{ Request::is('ingresos*') ? 'active' : '' }}">
        <p>Ingresos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('proveedores.index') }}"
       class="nav-link {{ Request::is('proveedores*') ? 'active' : '' }}">
        <p>Proveedores</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bienesTipos.index') }}"
       class="nav-link {{ Request::is('bienesTipos*') ? 'active' : '' }}">
        <p>Bienes Tipos</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('bienesSubTipos.index') }}"
       class="nav-link {{ Request::is('bienesSubTipos*') ? 'active' : '' }}">
        <p>Bienes Sub Tipos</p>
    </a>
</li>


