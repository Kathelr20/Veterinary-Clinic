<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalCount = Personal::count();
        $personal = Personal::all();
        return view('personal.index',compact('personal','personalCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $especialidad = Especialidad::all();
        return view('personal.create',compact('user','especialidad'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos de la solicitud
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'especialidad_id' => 'required|exists:especialidads,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación del archivo de imagen
        ]);
    
        // Inicializa un array de datos para crear un nuevo registro de Personal
        $data = [
            'user_id' => $request->input('user_id'),
            'especialidad_id' => $request->input('especialidad_id'),
        ];
    
        // Si hay un archivo de imagen subido, guárdalo
        if ($request->hasFile('foto')) {
            // Guarda la imagen en el directorio `public/fotos/` y obtiene la ruta
            $path = $request->file('foto')->store('fotos', 'public');
            // Añade la ruta de la imagen al array de datos
            $data['foto'] = $path;
        }
    
        // Crea un nuevo registro de Personal
        $personal = Personal::create($data);
    
        // Redirige al usuario a la lista de Personal con un mensaje de éxito
        return redirect()->route('personal.index')->with('success', 'Personal creado con éxito');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Personal $personal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra el registro de Personal por su ID
        $personal = Personal::findOrFail($id);
        
        // Elimina el registro
        $personal->delete();
        
        // Redirige a la página de índice de Personal con un mensaje de éxito
        return redirect()->route('personal.index')->with('success', 'Personal eliminado exitosamente');
    }
}
