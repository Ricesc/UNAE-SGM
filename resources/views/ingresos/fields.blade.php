<!-- Prov Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_id', 'Proveedor:') !!}
    {!! Form::select('prov_id', $proveedores, null, ['class' => 'form-control']) !!}
</div>

<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Usuario:') !!}
    {!! Form::select('id', $usuarios, null, ['class' => 'form-control']) !!}
</div>

<!-- Ing Fecha Compra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ing_fecha_compra', 'Ing Fecha Compra:') !!}
    {!! Form::text('ing_fecha_compra', null, ['class' => 'form-control','id'=>'ing_fecha_compra']) !!}
</div> 

@push('page_scripts')
<script type="text/javascript">
    $('#ing_fecha_compra').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: true
    })
</script>
@endpush

<!-- Ing Costo Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ing_costo_total', 'Ing Costo Total:') !!}
    {!! Form::number('ing_costo_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Ing Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ing_estado', 'Ing Estado:') !!}
    {!! Form::select('ing_estado', [0 => 'Inactivo', 1 => 'Activo'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione un estado']) !!}
</div>
