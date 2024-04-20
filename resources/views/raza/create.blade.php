<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Raza</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el cuerpo */
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        /* Estilo para el contenedor */
        .container {
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para etiquetas de formulario */
        .form-label {
            font-weight: bold;
        }

        /* Estilo para botones */
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Crear Nueva Raza</h1>

        <!-- Formulario para crear nueva raza -->
        <form action="{{ route('raza.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="raza" class="form-label">Nombre de la Raza</label>
                <input type="text" name="raza" id="raza" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tipo_mascota_id" class="form-label">Tipo de Mascota</label>
                <select name="tipo_mascota_id" id="tipo_mascota_id" class="form-select" required>
                    @foreach($tipo_mascota as $tipo_mascota)
                        <option value="{{ $tipo_mascota->id }}">{{ $tipo_mascota->mascota }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botones para enviar o cancelar el formulario -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Guardar</button>
                <!-- Botón para cancelar -->
                <a href="{{ route('raza.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>


