<!-- Prov Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prov_id', 'Prov Id:') !!}
    {!! Form::number('prov_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    {!! Form::number('usu_id', null, ['class' => 'form-control']) !!}
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
    {!! Form::number('ing_estado', null, ['class' => 'form-control']) !!}
</div>