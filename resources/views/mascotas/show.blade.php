<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Detalles de la Mascota</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        /* Estilos adicionales */
        body {
            background-color: #f8f9fa;
        }
        
        .container {
            margin-top: 20px;
        }
        
        h1 {
            color: #007b55;
            text-align: center;
        }
        
        .card {
            border-color: #007b55;
        }
        
        .card-body {
            border: 1px solid #007b55;
            border-radius: 5px;
        }
        
        .card-title {
            color: #007b55;
        }
        
        .btn-primary {
            background-color: #007b55;
            border-color: #007b55;
        }
        
        .btn-primary:hover {
            background-color: #005e3e;
        }

        /* Estilos para la foto de la mascota */
        .mascota-foto {
            display: block;
            width: 100%; /* La imagen ahora ocupa el 100% del ancho del contenedor */
            height: auto; /* Mantiene la proporción de aspecto */
            max-width: 800px; /* Limita el tamaño máximo de la imagen a 800px */
            margin: 10px 0;
        }
    </style>
</head>

<body>
<div class="container">
    <h1>Detalles de la Mascota: {{ $mascota->nombre }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información de la Mascota</h5>

            <!-- Muestra los detalles de la mascota -->
            <p><strong>Identificación:</strong> {{ $mascota->identificacion }}</p>
            <p><strong>Tipo de Mascota:</strong> {{ $mascota->tipoMascota->mascota }}</p>
            <p><strong>Tipo de Raza:</strong> {{ $mascota->raza->raza }}</p>
            <p><strong>Nombre:</strong> {{ $mascota->nombre }}</p>
            <p><strong>Edad:</strong> {{ $mascota->años }} años</p>
            
            <!-- Muestra la foto de la mascota si existe -->
            @if ($mascota->foto)
                <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" class="mascota-foto">
            @else
                <p><strong>Foto:</strong> No hay foto disponible</p>
            @endif

            <h5 class="mt-4">Información del Dueño</h5>
            <p><strong>Dueño:</strong> {{ $mascota->dueño }}</p>
            <p><strong>Teléfono:</strong> {{ $mascota->tel }}</p>
            <p><strong>Correo:</strong> {{ $mascota->correo }}</p>

            <!-- Botón para volver a la lista de citas -->
            @php
                $from = request()->query('from');
            @endphp
            @if ($from == 'citaestetica')
                <a href="{{ route('citaestetica.index') }}" class="btn btn-primary mt-3">Volver a la Lista de Citas Estéticas</a>
            @elseif ($from == 'citageneral')
                <a href="{{ route('citageneral.index') }}" class="btn btn-primary mt-3">Volver a la Lista de Citas Generales</a>
            @endif
        </div>
    </div>
</div>


    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>


