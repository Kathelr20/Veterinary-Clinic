<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Incluye aquí los enlaces a los archivos CSS si es necesario -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                    </div>

                    <div class="card-body">
                        <!-- Muestra un mensaje de éxito si existe en la sesión -->
                        <?php if (session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo session('status'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Muestra un mensaje estático -->
                        {{ __('You are logged in!') }}

                        <!-- Botón o enlace de "Cerrar sesión" -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



