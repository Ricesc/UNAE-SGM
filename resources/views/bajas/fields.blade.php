<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    {!! Form::number('usu_id', null, ['class' => 'form-control']) !!}
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
    {!! Form::label('baja_estado', 'Baja Estado:') !!}
    {!! Form::number('baja_estado', null, ['class' => 'form-control']) !!}
</div>