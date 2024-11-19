<!-- Proveedor -->
<div class="col-md-6 mb-3">
    <h5><i class="fas fa-user"></i> Proveedor:</h5>
    <p>{{ $ingreso->proveedor->prov_nombre }}</p>
</div>

<!-- Fecha de Compra -->
<div class="col-md-6 mb-3">
    <h5><i class="fas fa-calendar"></i> Fecha de Compra:</h5>
    <p>{{ \Carbon\Carbon::parse($ingreso->ing_fecha_compra)->format('d/m/Y') }}</p>
</div>

<!-- Costo Total -->
<div class="col-md-6 mb-3">
    <h5><i class="fas fa-money-bill-wave"></i> Costo Total:</h5>
    <p> {{ number_format($ingreso->ing_costo_total, 2) }}</p>
</div>

<!-- Responsable -->
<div class="col-md-6 mb-3">
    <h5><i class="fas fa-user-circle"></i> Responsable:</h5>
    <p>{{ $ingreso->usu->name }}</p>
</div>

<!-- Estado del Ingreso -->
<div class="col-md-6 mb-3">
    <h5><i class="fas fa-info-circle"></i> Estado del Ingreso:</h5>
    <p>
        <span class="badge badge-{{ $ingreso->ing_estado == 0 ? 'warning' : 'success' }}">
            {{ $ingreso->ing_estado == 0 ? 'Pendiente' : 'Procesado' }}
        </span>
    </p>
</div>
