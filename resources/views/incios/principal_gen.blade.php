<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de inicio</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Estilos adicionales -->
    <style>
        body {
            background-color: #f0f8ff;
            background-image: url('images/test.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .navbar {
            background-color: #007b55;
        }

        .navbar-brand, .navbar-text, .btn-link {
            color: white;
        }

        .btn-link:hover {
            color: #e0e0e0;
        }

        .btn-custom {
            background-color: #007b55;
            border: none;
            color: white;
            border-radius: px;
            margin: 20px;
            padding: 5px;
        }

        .btn-custom:hover {
            background-color: #006b4a;
        }

        .option-img {
            width: 300px; /* Ajusta el tamaño de la imagen según sea necesario */
            height: 300px; /* Ajusta el tamaño de la imagen según sea necesario */
        }

        /* Estilo para centrar el contenido dentro de los botones */
        .btn-custom img {
            display: block;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Barra superior -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="navbar-text">
                Bienvenid@ a tu portal Veterinary Clinic, 👤{{ Auth::user()->name }}
            </span>
            <div class="ml-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página -->
    <div class="container text-center mt-5">
        <h2>Selecciona una opción para continuar:</h2>
        <h1></h1>
        <h1>⬇</h1>
        <div class="d-flex justify-content-center flex-wrap">
            <!-- Botones con imágenes -->
            <a href="{{ route('citageneral.index') }}" class="btn btn-custom">
                <img src="images/citag.png" alt="Especialidad" class="option-img">
            </a>
            <a href="{{ route('mascotas.index') }}" class="btn btn-custom">
                <img src="images/mascotas.png" alt="Mascotas" class="option-img">
            </a>
            <a href="{{ route('citaestetica.index') }}" class="btn btn-custom">
                <img src="images/citae.png" alt="Personal" class="option-img">
            </a>
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>


