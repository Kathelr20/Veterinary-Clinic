<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Cita General</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Estilos adicionales -->
    <style>
        /* Estilos personalizados */
        .btn-cancelar {
            background-color: gray;
            color: white;
            margin-right: 10px;
        }

        .btn-guardar {
            background-color: #007b55; /* Color verde utilizado anteriormente */
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Editar Cita General</h1>

        <!-- Formulario de edición -->
        <form action="{{ route('citageneral.update', $cita->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo de fecha -->
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $cita->fecha }}" required>
            </div>

            <!-- Campo de hora -->
            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" id="hora" class="form-control" value="{{ $cita->hora }}" required>
            </div>

            <!-- Campo de valor -->
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" name="valor" id="valor" class="form-control" value="{{ $cita->valor }}" required>
            </div>

            <!-- Botones de guardar y cancelar -->
            <div class="form-group">
                <button type="submit" class="btn btn-guardar">Actualizar</button>
                <a href="{{ route('citageneral.index') }}" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

