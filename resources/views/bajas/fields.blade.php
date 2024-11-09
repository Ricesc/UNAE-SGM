<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    {!! Form::select('usu_id', $usuario, null, ['class' => 'form-control']) !!}
</div>


<!-- Baja Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('baja_fecha', 'Baja Fecha:') !!}
    {!! Form::text('baja_fecha', null, ['class' => 'form-control','id'=>'baja_fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#baja_fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Baja Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('baja_estado', 'Estado de la Baja:') !!}
    {!! Form::select('baja_estado', [
    '0' => 'Pendiente',
    '1' => 'Procesado'
    ], null, ['class' => 'form-control']) !!}
</div>