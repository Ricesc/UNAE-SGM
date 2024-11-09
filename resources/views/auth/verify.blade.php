<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Email Verification</title>
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
            color: #333;
        }

        .verification-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(10px);
        }

        .box-title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(118, 75, 162, 0.1);
        }

        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .alert-success {
            background: rgba(72, 187, 120, 0.1);
            color: #2f855a;
            border: 2px solid rgba(72, 187, 120, 0.2);
        }

        .box-body {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .box-body p {
            margin-bottom: 20px;
        }

        .resend-link {
            display: inline-block;
            color: #764ba2;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .resend-link:hover {
            color: #667eea;
            text-decoration: underline;
        }

        .icon-envelope {
            font-size: 48px;
            color: #764ba2;
            text-align: center;
            margin-bottom: 20px;
            display: block;
        }

        @media (max-width: 480px) {
            .verification-container {
                padding: 30px 20px;
            }

            .box-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="verification-container">
        <i class="fas fa-envelope icon-envelope"></i>
        <h3 class="box-title">Verifica tu dirección de correo</h3>

        <div class="box-body">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
            </div>
            @endif

            <p>
                Antes de continuar, por favor revisa tu correo electrónico para encontrar el enlace de verificación.
                Si no has recibido el correo,
                <a href="#"
                    class="resend-link"
                    onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                    haz clic aquí para solicitar otro
                </a>
            </p>

            <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>