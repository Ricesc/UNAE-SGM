<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre:', ['for' => 'name']) !!}
    {!! Form::text('name', null, [
        'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : (old('name') ? 'is-valid' : '')), 
        'id' => 'name',
        'maxlength' => 255
    ]) !!}
    @if ($errors->has('name'))
        <small class="text-danger">
            {{ $errors->first('name') }}
        </small>
    @elseif (old('name'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Correo:', ['for' => 'email']) !!}
    {!! Form::email('email', null, [
        'class' => 'form-control ' . ($errors->has('email') ? 'is-invalid' : (old('email') ? 'is-valid' : '')), 
        'id' => 'email'
    ]) !!}
    @if ($errors->has('email'))
        <small class="text-danger">
            {{ $errors->first('email') }}
        </small>
    @elseif (old('email'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:', ['for' => 'password']) !!}
    {!! Form::password('password', [
        'class' => 'form-control ' . ($errors->has('password') ? 'is-invalid' : (old('password') ? 'is-valid' : '')), 
        'id' => 'password'
    ]) !!}
    @if ($errors->has('password'))
        <small class="text-danger">
            {{ $errors->first('password') }}
        </small>
    @elseif (old('password'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Confirmación de contraseña:', ['for' => 'password_confirmation']) !!}
    {!! Form::password('password_confirmation', [
        'class' => 'form-control ' . ($errors->has('password_confirmation') ? 'is-invalid' : (old('password_confirmation') ? 'is-valid' : '')), 
        'id' => 'password_confirmation'
    ]) !!}
    @if ($errors->has('password_confirmation'))
        <small class="text-danger">
            {{ $errors->first('password_confirmation') }}
        </small>
    @elseif (old('password_confirmation'))
        <small class="text-success">
            ¡Se ve bien!
        </small>
    @endif
</div>
