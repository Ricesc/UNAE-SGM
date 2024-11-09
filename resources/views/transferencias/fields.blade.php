<!-- Sala Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_id', 'Sala Id:') !!}
    {!! Form::select('sala_id', $sala, null, ['class' => 'form-control']) !!}
</div>


<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_id', 'Usuario:') !!}
    {!! Form::select('usu_id', $usuario, null, ['class' => 'form-control']) !!}
</div>

<!-- Tran Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tran_fecha', 'Tran Fecha:') !!}
    {!! Form::text('tran_fecha', null, ['class' => 'form-control','id'=>'tran_fecha']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tran_fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tran Procesado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tran_procesado', 'Tran Procesado:') !!}
    {!! Form::number('tran_procesado', null, ['class' => 'form-control']) !!}
</div>