@extends('layouts.index1')

@section('title', 'Lista de Citas Estéticas')

@section('page_title', 'Lista de Citas Estéticas')

@section('content')
    <!-- Mostrar mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Botón para crear nueva cita estética -->
    <a href="{{ route('citaestetica.create') }}" class="btn btn-water">Crear Nueva Cita Estética</a>

    <!-- Tabla para mostrar la lista de citas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mascota</th>
                <th>Personal</th>
                <th>Tipo Estética</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Valor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>
                        <a href="{{ route('mascotas.show', ['id' => $cita->mascota->id, 'from' => 'citaestetica']) }}">
                            {{ $cita->mascota->nombre }}
                        </a>
                    </td>
                    <td>{{ $cita->personal->nombre }}</td>
                    <td>{{ $cita->tipoEstetica->nombre }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>{{ $cita->valor }}</td>
                    <td>
                        <!-- Botones de acciones -->
                        <a href="{{ route('citaestetica.edit', $cita->id) }}" class="btn btn-warning btn-acciones">Editar</a>
                        <form action="{{ route('citaestetica.destroy', $cita->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-acciones btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <!-- Scripts adicionales para la página de Lista de Citas Estéticas -->
    <script>
        $(document).ready(function() {
            $('.btn-eliminar').on('click', function(event) {
                event.preventDefault(); // Evita el envío inmediato del formulario

                // Muestra una ventana de confirmación
                var confirmacion = confirm('¿Estás seguro de que quieres eliminar esta cita?');

                // Si el usuario confirma, envía el formulario
                if (confirmacion) {
                    $(this).closest('form').submit(); // Envía el formulario
                }
            });
        });
    </script>
@endsection


