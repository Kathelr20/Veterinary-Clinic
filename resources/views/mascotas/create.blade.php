<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Nueva Mascota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Estilos personalizados para los botones -->
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
        <h1>Crear Nueva Mascota</h1>

        <!-- Formulario para crear una nueva mascota -->
        <form action="{{ route('mascotas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Columna izquierda -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_mascota_id">Tipo de Mascota:</label>
                        <select name="tipo_mascota_id" id="tipo_mascota_id" class="form-control" required>
                            <option value="">Selecciona un tipo</option>
                            @foreach($tipos_mascotas as $tipo)
                                <option value="{{ $tipo->id }}" {{ old('tipo_mascota_id') == $tipo->id ? 'selected' : '' }}>
                                    {{ $tipo->mascota }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="raza_id">Raza:</label>
                        <select name="raza_id" id="raza_id" class="form-control" required>
                            <option value="">Selecciona una raza</option>
                            @if($razas->isNotEmpty())
                                @foreach($razas as $raza)
                                    <option value="{{ $raza->id }}" {{ old('raza_id') == $raza->id ? 'selected' : '' }}>
                                        {{ $raza->raza }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="identificacion">Identificación:</label>
                        <input type="text" id="identificacion" name="identificacion" class="form-control" required value="{{ old('identificacion') }}">
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required value="{{ old('nombre') }}">
                    </div>

                    <div class="form-group">
                        <label for="años">Años:</label>
                        <input type="number" id="años" name="años" class="form-control" required value="{{ old('años') }}">
                    </div>
                </div>

                <!-- Columna derecha -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="dueño">Dueño:</label>
                        <input type="text" id="dueño" name="dueño" class="form-control" required value="{{ old('dueño') }}">
                    </div>

                    <div class="form-group">
                        <label for="tel">Teléfono:</label>
                        <input type="tel" id="tel" name="tel" class="form-control" required value="{{ old('tel') }}">
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" id="correo" name="correo" class="form-control" required value="{{ old('correo') }}">
                    </div>
                </div>
            </div>

            <!-- Botones de guardar y cancelar -->
            <div class="form-group mt-3">
                <a href="{{ route('mascotas.index') }}" class="btn btn-cancelar">Cancelar</a>
                <button type="submit" class="btn btn-guardar">Guardar</button>
            </div>
        </form>
    </div>

    <!-- Script para cargar razas dinámicamente según el tipo de mascota seleccionado -->
    <script>
        $(document).ready(function() {
            // Cuando el tipo de mascota cambia, hacer una solicitud AJAX para obtener las razas correspondientes
            $('#tipo_mascota_id').on('change', function() {
                var tipo_mascota_id = $(this).val();

                // Si se ha seleccionado un tipo de mascota
                if (tipo_mascota_id) {
                    // Generar la URL de la ruta correctamente
                    var url = '{{ route("razas.by_tipo_mascota", ":tipo_mascota_id") }}';
                    url = url.replace(':tipo_mascota_id', tipo_mascota_id);

                    $.ajax({
                        url: url,
                        method: 'GET',
                        success: function(data) {
                            // Limpiar el selector de razas
                            $('#raza_id').empty();
                            
                            // Agregar opciones de razas
                            $('#raza_id').append('<option value="">Selecciona una raza</option>');
                            $.each(data, function(index, raza) {
                                $('#raza_id').append('<option value="' + raza.id + '">' + raza.raza + '</option>');
                            });
                        }
                    });
                } else {
                    // Si no hay un tipo de mascota seleccionado, limpiar el selector de razas
                    $('#raza_id').empty();
                    $('#raza_id').append('<option value="">Selecciona una raza</option>');
                }
            });
        });
    </script>

</body>

</html>







