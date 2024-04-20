<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Especialidad</title>
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

        /* Estilo del botón cancelar */
        .btn-secondary {
            color: white;
            background-color: #007b55; /* Color de fondo */
            border-color: #007b55; /* Color de borde */
        }

        /* Cambios de color al pasar el cursor sobre los botones */
        .btn-secondary:hover {
            background-color: #005f47; /* Color más oscuro */
            border-color: #005f47;
        }

        /* Estilo para el formulario */
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Espaciado entre los elementos del formulario */
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Tarjeta (card) que contiene el formulario -->
        <div class="card">
            <div class="card-body">
                <h1 class="card-title mb-4">Editar Especialidad</h1>
                <form action="{{ route('especialidad.update', $especialidad->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo de especialidad -->
                    <div class="form-group">
                        <label for="especialidad" class="form-label">Especialidad</label>
                        <input type="text" name="especialidad" id="especialidad" class="form-control" value="{{ $especialidad->especialidad }}" required>
                    </div>

                    <!-- Botones de acción -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Actualizar
                        </button>
                        <a href="{{ route('especialidad.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
