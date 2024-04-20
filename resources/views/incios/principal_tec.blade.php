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
            background-color: #f0f8ff; /* Color de fondo por si la imagen no se carga */
            background-image: url('images/test.jpg'); /* URL de la imagen de fondo */
            background-size: cover; /* Ajusta la imagen para que cubra toda la pantalla */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-position: center; /* Centra la imagen de fondo */
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
            border-radius: 5px;
            margin: 20px;
        }

        .btn-custom:hover {
            background-color: #006b4a;
        }
    </style>
</head>

<body>
    <!-- Barra superior -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Muestra el nombre de la persona que inició sesión -->
            <span class="navbar-text">
                Bienvenid@ a tu portal 🛠 Tecnico, 👤{{ Auth::user()->name }} <!-- Asegúrate de usar la función adecuada para obtener el nombre del usuario que inició sesión -->
            </span>
            <!-- Botón de deslogueo -->
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
            <!-- Botones para navegar a otras páginas -->
            <a href="{{ route('users.index') }}" class="btn btn-custom">
            👤 USUARIOS 👤
            </a>
            <a href="{{ route('especialidad.index') }}" class="btn btn-custom">
            👩‍💻ESPECIALIDAD👨‍💻
            </a>
            <a href="{{ route('personal.index') }}" class="btn btn-custom">
            👷‍♂️PERSONAL👷‍♀️
            </a>

            <!-- Agrega más botones según sea necesario -->
        </div>
    </div>

    <div class="d-flex justify-content-center flex-wrap">
        <a href="{{ route('tipo_estetica.index') }}" class="btn btn-custom">
                ✂TIPO DE ESTETICA✂
                </a>
                <a href="{{ route('tipo_mascota.index') }}" class="btn btn-custom">
                🐶TIPO DE MASCOTA🐱
                </a>
                <a href="{{ route('raza.index') }}" class="btn btn-custom">
                📌RAZA📌
                </a>
    </div>
    

    

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
