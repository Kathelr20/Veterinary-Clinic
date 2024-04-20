<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Mascota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Estilos adicionales -->
    <style>
        .navbar {
            background-color: #007b55; /* Color verde utilizado anteriormente */
            margin-bottom: 20px;
        }
        .navbar-brand, .navbar-text, .btn-link {
            color: white;
        }
        .btn-link:hover {
            color: #e0e0e0;
        }
        .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007b55; /* Color verde utilizado anteriormente */
            border-color: #007b55;
        }
        .btn-primary:hover {
            background-color: #006b4a; /* Color verde más oscuro para hover */
            border-color: #006b4a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Editar Mascota</h1>

        <!-- Formulario para editar una mascota -->
        <div class="form-container">
            <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="identificacion">Identificación:</label>
                        <input type="text" id="identificacion" name="identificacion" class="form-control" required value="{{ $mascota->identificacion }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required value="{{ $mascota->nombre }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="años">Años:</label>
                        <input type="number" id="años" name="años" class="form-control" required value="{{ $mascota->años }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
                        @if($mascota->foto)
                            <img src="{{ asset('storage/' . $mascota->foto) }}" alt="Foto actual de {{ $mascota->nombre }}" width="100">
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dueño">Dueño:</label>
                        <input type="text" id="dueño" name="dueño" class="form-control" required value="{{ $mascota->dueño }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tel">Teléfono:</label>
                        <input type="tel" id="tel" name="tel" class="form-control" required value="{{ $mascota->tel }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required value="{{ $mascota->correo }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('mascotas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>

    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>


