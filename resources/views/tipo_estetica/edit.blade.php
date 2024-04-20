<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Mascota</title>
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

        /* Estilo para el formulario */
        .container {
            margin-top: 50px; /* Espacio superior */
            max-width: 600px; /* Ancho máximo del formulario */
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para los botones */
        .btn {
            margin-top: 10px; /* Espacio superior */
            border-radius: 5px; /* Borde redondeado */
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
        <h1>Editar Tipo de Mascota</h1>
        <form action="{{ route('tipo_estetica.update', $nombre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Tipo de Mascota:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $nombre->nombre }}">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Actualizar
                </button>
                <a href="{{ route('tipo_estetica.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>


