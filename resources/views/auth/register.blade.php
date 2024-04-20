<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el cuerpo */
        body {
            background-color: #007b55 ; /* Fondo suave */
            padding: 20px;
        }

        /* Estilo para el formulario */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px; /* Borde redondeado */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            width: 50%; /* Ajusta el ancho según sea necesario */
        }

        /* Estilo para etiquetas */
        .form-label {
            font-weight: bold;
        }

        /* Estilo para los botones */
        .btn-primary {
            background-color: #007b55; /* Color principal */
            border: none;
            color: white; /* Texto blanco */
            margin-right: 10px; /* Espacio entre los botones */
        }

        .btn-secondary {
            background-color: #ccc; /* Color gris claro */
            border: none;
            color: black; /* Texto negro */
        }

        /* Estilo para iconos */
        .icon {
            margin-right: 5px; /* Espacio entre icono y texto */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1 class="text-center">Registro de Usuario</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rol:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="">Seleccionar rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-ban icon"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-user-plus icon"></i> Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

