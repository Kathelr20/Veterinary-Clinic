<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Cita Estética</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados para los botones */
        .btn-cancelar {
            background-color: gray;
            color: white;
            margin-right: 10px;
        }

        .btn-guardar {
            background-color: #007b55;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Crear Nueva Cita Estética</h1>

        <!-- Mostrar mensajes de error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear una nueva cita estética -->
        <form action="{{ route('citaestetica.store') }}" method="POST">
            @csrf

            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mascota_id">Mascota:</label>
                        <select name="mascota_id" id="mascota_id" class="form-control" required>
                            @foreach ($mascotas as $mascota)
                                <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="personal_id">Personal:</label>
                        <select name="personal_id" id="personal_id" class="form-control" required>
                            @foreach ($personal as $personal)
                                <option value="{{ $personal->id }}">{{ $personal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="hora">Hora:</label>
                        <input type="time" name="hora" id="hora" class="form-control" required value="{{ old('hora') }}">
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_estetica_id">Tipo Estética:</label>
                        <select name="tipo_estetica_id" id="tipo_estetica_id" class="form-control" required>
                            @foreach ($tiposEstetica as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ old('fecha') }}">
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="number" name="valor" id="valor" class="form-control" step="0.01" required value="{{ old('valor') }}">
                    </div>
                </div>
            </div>

            <!-- Botones de guardar y cancelar -->
            <div class="form-group mt-3">
                <a href="{{ route('citaestetica.index') }}" class="btn btn-cancelar">Cancelar</a>
                <button type="submit" class="btn btn-guardar">Guardar</button>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>


