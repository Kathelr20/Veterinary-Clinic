@extends('layouts.index1')

@section('title', 'Lista de Citas Generales')

@section('page_title', 'Lista de Citas Generales')

@section('content')
    <div class="container">
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

        <!-- Botón para crear nueva cita general -->
        <a href="{{ route('citageneral.create') }}" class="btn btn-water">Crear Nueva Cita General</a>

        <!-- Tabla para mostrar la lista de citas generales -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mascota</th>
                    <th>Personal</th>
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
                            <a href="{{ route('mascotas.show', ['id' => $cita->mascota->id, 'from' => 'citageneral']) }}">
                                {{ $cita->mascota->nombre }}
                            </a>
                        </td>
                        <td>{{ $cita->personal->nombre }}</td>
                        <td>{{ $cita->fecha }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $cita->valor }}</td>
                        <td>
                            <!-- Botones de acciones -->
                            <a href="{{ route('citageneral.edit', $cita->id) }}" class="btn btn-warning btn-acciones">Editar</a>
                            <form action="{{ route('citageneral.destroy', $cita->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-acciones">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @section('scripts')
        <!-- Incluye jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Incluye Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    @endsection
@endsection


