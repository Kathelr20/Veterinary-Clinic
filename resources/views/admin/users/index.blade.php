<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el cuerpo */
        body {
            background-color: #f8f9fa; /* Color de fondo suave */
        }

        /* Estilo para la barra superior (navbar) */
        .navbar {
            background-color: #007b55; /* Color de fondo oscuro para la barra superior */
            padding: 10px 15px; /* Añade un poco de padding */
            position: sticky; /* Hace que la barra superior sea fija */
            top: 0; /* Pega la barra superior a la parte superior de la página */
            z-index: 1000; /* Asegura que la barra superior esté sobre otros elementos */
        }

        .navbar-text {
            color: white; /* Color de texto blanco */
            margin-right: auto; /* Alinea el texto a la izquierda */
        }

        .navbar .btn-link {
            color: white; /* Color de los botones en la barra superior */
        }

        .navbar .btn-link:hover {
            color: #d3d3d3; /* Color al pasar el cursor sobre los botones */
        }

        /* Estilo para las tarjetas */
        .card {
            border-radius: 8px; /* Borde redondeado */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin-bottom: 16px; /* Espacio entre las tarjetas */
        }

        /* Estilo para los botones dentro de las tarjetas */
        .btn-sm {
            margin-right: 8px;
        }
    </style>
</head>

<body>
    <!-- Barra superior -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="navbar-text">
                👤Usuario: {{ Auth::user()->name }}
            </span>
            <div class="ml-auto">
                <form method="POST" action="{{ route('principal_tec') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        🏡INICIO🏡 <!-- En lugar del ícono de Font Awesome, coloca el texto "Inicio" -->
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Encabezado "Usuarios" con posición fija -->
    <div class="container mt-5 sticky-header">
        <h1>Usuarios</h1>
        <a href="{{ route('register.post') }}" class="btn btn-primary">Registrar Nuevo Usuario</a>
    </div>

    <!-- Mostrar mensajes de éxito o error -->
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Contenido de la vista -->
    <div class="container mt-4">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>{{ $user->name }}</h4>
                            <p><strong>Correo:</strong> {{ $user->email }}</p>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-secondary btn-sm">Editar</a>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar a este usuario?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
