@extends('layouts.index1')

@section('title', 'Lista de Mascotas')

@section('content')
    <h1>Lista de Mascotas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Tipo de Mascota</th>
                <th>Raza</th>
                <th>Foto</th>
                <th>Dueño</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascotas as $mascota)
                <tr>
                    <td>{{ $mascota->id }}</td>
                    <td>{{ $mascota->identificacion }}</td>
                    <td>{{ $mascota->nombre }}</td>
                    <td>{{ $mascota->tipomascota->mascota }}</td>
                    <td>{{ $mascota->raza->raza }}</td>
                    <td>
                        @if ($mascota->foto)
                            <img src="{{ asset('storage/' . $mascota->foto) }}" alt="Foto de la mascota" width="100">
                        @else
                            No hay foto
                        @endif
                    </td>
                    <td>{{ $mascota->dueño }}</td>
                    <td>{{ $mascota->tel }}</td>
                    <td>{{ $mascota->correo }}</td>
                    <td>
                        <a href="{{ route('mascotas.edit', $mascota->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('mascotas.create') }}" class="btn btn-water">Añadir Mascota</a>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-eliminar').on('click', function(event) {
                event.preventDefault();
                var confirmacion = confirm('¿Estás seguro de que quieres eliminar esta mascota?');
                if (confirmacion) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
@endsection



