<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;  // Importa el trait HasRoles
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Define la propiedad para almacenar la URL de redirección predeterminada después del inicio de sesión.
     */
    protected $redirectTo;

    /**
     * Constructor del controlador.
     */
    public function __construct()
    {
        // Permite el acceso solo a los huéspedes (usuarios no autenticados) a las rutas de inicio de sesión, excepto el método `logout`.
        $this->middleware('guest')->except('logout');
        $this->redirectTo = route('home');
    }

    /**
     * Método que se ejecuta después de que un usuario inicia sesión exitosamente.
     * Realiza la redirección basada en los roles del usuario.
     */
    protected function authenticated(Request $request, $user)
    {
    
        // Verificación de los roles del usuario
        if ($user->hasRole('Tecnico')) {
            return redirect()->route('principal_tec');
        } elseif ($user->hasRole('General')) {
            return redirect()->route('principal_gen');
        } else {
            return redirect()->route('home');
        }
    }
    

    /**
     * Método para cerrar sesión del usuario.
     */
    public function logout(Request $request)
    {
        // Cerrar la sesión del usuario y redirigir a la página de inicio de sesión.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // Opcional: esto ayuda a proteger contra ataques de sesión.

        return redirect()->route('login');
    }
}


