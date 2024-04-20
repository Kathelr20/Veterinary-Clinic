<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nueva Especialidad</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo del cuerpo */
        body {
            background-color: #f8f9fa; /* Fondo suave */
            padding: 20px; /* Espaciado alrededor de la página */
        }

        /* Estilo para el formulario */
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Espacio inferior */
        }

        /* Estilo de los botones */
        .btn-primary {
            color: white;
            background-color: #007b55; /* Color de fondo */
            border-color: #007b55; /* Color de borde */
        }

        /* Cambios de color al pasar el cursor sobre los botones */
        .btn-primary:hover {
            background-color: #005f47; /* Color más oscuro */
            border-color: #005f47;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Crear Nueva Especialidad</h1>
        <!-- Formulario para crear nueva especialidad -->
        <form action="{{ route('especialidad.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" name="especialidad" id="especialidad" class="form-control" required>
            </div>
            
            <!-- Botones para crear y volver a la lista -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Crear
                </button>
                <a href="{{ route('especialidad.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la lista
                </a>
            </div>
        </form>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
