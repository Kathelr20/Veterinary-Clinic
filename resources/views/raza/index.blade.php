<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice de Razas</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el cuerpo */
        body {
            background-color: #f8f9fa; /* Fondo suave */
        }

        /* Estilo de la barra superior (navbar) */
        .navbar {
            background-color: #007b55 ; /* Color verde */
            padding: 10px 15px; /* Añade un poco de padding */
            position: sticky; /* Hace que la barra superior sea fija */
            top: 0; /* Pega la barra superior a la parte superior de la página */
            z-index: 1000; /* Asegura que la barra superior esté sobre otros elementos */
        }

        /* Estilo de los botones en la barra superior */
        .navbar .btn-link {
            color: white; /* Color de los botones en la barra superior */
        }

        .navbar .btn-link:hover {
            color: #d3d3d3; /* Color al pasar el cursor sobre los botones */
        }

        /* Estilo de las tarjetas */
        .card {
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin-bottom: 20px; /* Margen inferior */
        }

        /* Estilo de los botones */
        .btn {
            border-radius: 5px; /* Bordes redondeados */
        }

        .btn-primary {
            color: white;
            background-color: #007b55; /* Color de fondo */
            border-color: #007b55; /* Color de borde */
        }

        .btn-primary:hover {
            background-color: #005f47;
            border-color: #005f47;
        }

        .btn-danger {
            color: white;
            background-color: red;
            border-color: red;
        }

        .btn-danger:hover {
            background-color: darkred;
            border-color: darkred;
        }

        .btn-warning {
            color: white;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
    </style>
</head>

<body>
    <!-- Barra superior (navbar) -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="navbar-text">
                👤 Usuario: {{ Auth::user()->name }}
            </span>
            <div class="ml-auto">
                <form method="POST" action="{{ route('principal_tec') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        🏡 Inicio
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4">Índice de Razas</h1>
        <!-- Botón para agregar nueva raza -->
        <a href="{{ route('raza.create') }}" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Nueva Raza
        </a>

        <div class="row">
            @foreach ($raza as $raza)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ID: {{ $raza->id }}</h5>
                            <p><strong>Raza:</strong> {{ $raza->raza }}</p>
                            <p><strong>Tipo de Mascota:</strong> {{ $raza->tipomascota->mascota }}</p>
                            <!-- Botones de acción -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('raza.edit', ['raza' => $raza->id]) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('raza.destroy', ['raza' => $raza->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
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

