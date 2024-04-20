<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role; // Importa el modelo de rol

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Define la ruta a la que se redirigirá a los usuarios después de registrarse.
     *
     * @var string
     */
    protected $redirectTo = '/users'; // Cambia la ruta a la que quieres redirigir

    /**
     * Crear una nueva instancia de controlador.
     *
     * @return void
     */
    // importante
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Muestra el formulario de registro y pasa los roles a la vista.
     */
    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    /**
     * Obtener un validador para una solicitud de registro entrante.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'exists:roles,name'], // Valida que el rol existe
        ]);
    }

    /**
     * Crear una nueva instancia de usuario después de un registro válido.
     *
     * @param array $data
     * @return \App\Models\User|null
     */
    protected function create(array $data)
    {
        // Crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($data['password']),
        ]);
    
        // Asignar el rol al usuario solo si se seleccionó un rol específico
        if (!empty($data['role'])) {
            $user->assignRole($data['role']);
        }
    
        // Registra el evento de usuario registrado
        event(new \Illuminate\Auth\Events\Registered($user));
    
        return $user;
    }
    
    
}


