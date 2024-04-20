<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Crear Nuevo Personal</title>

    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el cuerpo */
        body {
            background-color: #f8f9fa;
        }

        /* Estilo del formulario */
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para los botones */
        .btn-primary {
            background-color: #007b55;
            border-color: #007b55;
        }

        .btn-primary:hover {
            background-color: #005f47;
            border-color: #005f47;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }

        /* Estilo para etiquetas y entradas */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Estilo para el contenedor del formulario */
        .container {
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Crear Nuevo Personal</h1>
            <form action="{{ route('personal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" accept="image/*" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="user_id">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($user as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="especialidad_id">Especialidad</label>
                    <select name="especialidad_id" id="especialidad_id" class="form-control" required>
                        @foreach($especialidad as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->especialidad }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('personal.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

