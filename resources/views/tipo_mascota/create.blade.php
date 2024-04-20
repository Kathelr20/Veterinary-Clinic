<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Tipo de Mascota</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <style>
        body {
            background-color: #f8f9fa; /* Fondo suave */
        }

        /* Estilo de la tarjeta */
        .card {
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin-top: 20px; /* Margen superior */
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

        .btn-secondary {
            color: white;
            background-color: gray;
            border-color: gray;
        }

        .btn-secondary:hover {
            background-color: darkgray;
            border-color: darkgray;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Crear Nuevo Tipo de Mascota</h1>
        <div class="card p-4">
            <form action="{{ route('tipo_mascota.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="mascota" class="form-label">Mascota:</label>
                    <input type="text" name="mascota" id="mascota" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        Crear
                    </button>
                    <a href="{{ route('tipo_mascota.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

