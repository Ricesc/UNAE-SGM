<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            backdrop-filter: blur(10px);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo a {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
        }

        .login-box-msg {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #764ba2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.1);
        }

        .input-group-text {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .remember-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .custom-checkbox input {
            width: 18px;
            height: 18px;
            accent-color: #764ba2;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
        }

        .links-container {
            margin-top: 25px;
            text-align: center;
        }

        .links-container a {
            color: #764ba2;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            display: inline-block;
            margin: 5px 0;
        }

        .links-container a:hover {
            color: #667eea;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
        </div>

        <p class="login-box-msg">Inicia sesión para continuar</p>

        <form method="post" action="{{ url('/login') }}">
            @csrf

            <div class="input-group">
                <input type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Correo electrónico"
                    class="form-control @error('email') is-invalid @enderror">
                <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </div>
                @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group">
                <input type="password"
                    name="password"
                    placeholder="Contraseña"
                    class="form-control @error('password') is-invalid @enderror">
                <div class="input-group-text">
                    <i class="fas fa-lock"></i>
                </div>
                @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="remember-row">
                <label class="custom-checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <span>Recordarme</span>
                </label>
            </div>

            <button type="submit" class="btn-login">
                Iniciar Sesión
            </button>
        </form>

        <div class="links-container">
            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            <br>
            <a href="{{ route('register') }}">Crear cuenta nueva</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>