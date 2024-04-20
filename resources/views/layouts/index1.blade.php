<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .navbar {
            background-color: #007b55;
            margin-bottom: 20px;
        }
        .navbar-brand,
        .navbar-text,
        .btn-link {
            color: white;
        }
        .btn-link:hover {
            color: #e0e0e0;
        }
        .btn-water {
            background-color: #007b55;
            border: none;
            color: white;
            border-radius: 5px;
            margin: 20px;
        }
        .btn-water:hover {
            background-color: #006b4a;
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="navbar-text">
                👤 Usuario: {{ Auth::user()->name }}
            </span>
            <div class="ml-auto">
                <form method="POST" action="{{ route('principal_gen') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        🏡 Inicio
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Zona de contenido -->
        @yield('content')
    </div>

    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

    <!-- Zona de scripts adicionales -->
    @yield('scripts')
</body>

</html>
