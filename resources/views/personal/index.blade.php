<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
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

        /* Estilo de las tarjetas */
        .card {
            margin-bottom: 20px; /* Espacio inferior */
            border-radius: 8px; /* Borde redondeado */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }

        /* Estilo de los botones */
        .btn {
            margin: 5px;
            border-radius: 5px; /* Borde redondeado */
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

        .btn-primary {
            color: white;
            background-color: #007b55; /* Color de fondo */
            border-color: #007b55; /* Color de borde */
        }

        .btn-primary:hover {
            background-color: #005f47;
            border-color: #005f47;
        }

        /* Estilo para la barra superior */
        .navbar {
            background-color: #007b55; /* Color de fondo oscuro */
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
    </style>
</head>

<body>
    <!-- Barra superior -->
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
        <h1 class="mb-4">Personal</h1>

        <!-- Botón para agregar nuevo personal -->
        <a href="{{ route('personal.create') }}" class="btn btn-primary mb-4">
            <i class="fas fa-plus"></i> Nuevo Personal
        </a>

        <!-- Mostrar mensaje de éxito o error -->
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

        <div class="row">
            @foreach ($personal as $persona)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ID: {{ $persona->id }}</h5>
                            <!-- Muestra la foto pequeña -->
                            <div class="text-center mb-3">
                                <img src="{{ asset('storage/' . $persona->foto) }}" alt="Foto" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                            </div>
                            <p><strong>Usuario:</strong> {{ $persona->user->name }}</p>
                            <p><strong>Especialidad:</strong> {{ $persona->especialidad->especialidad }}</p>
                            <!-- Botones de acción -->
                            <form action="{{ route('personal.destroy', ['personal' => $persona->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
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


