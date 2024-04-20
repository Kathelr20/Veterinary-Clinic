<?php

namespace App\Http\Controllers;

use App\Models\raza;
use App\Models\Tipo_mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raza = raza::all();
        return view('raza.index', compact('raza'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo_mascota = Tipo_Mascota::all(); // Suponiendo que TipoMascota sea el nombre del modelo para tus tipos de mascota
        return view('raza.create', compact('tipo_mascota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'raza' => 'required|string|max:255',
            'tipo_mascota_id' => 'required|exists:tipo_mascotas,id', // Validar que el tipo_mascota_id exista en la tabla tipo_mascotas
        ]);
    
        // Crear una nueva instancia de Raza
        $raza = new raza();
    
        // Asignar los datos del formulario a los atributos del modelo
        $raza->raza = $validatedData['raza'];
        $raza->tipo_mascota_id = $validatedData['tipo_mascota_id'];
    
        // Guardar la nueva raza en la base de datos
        $raza->save();
    
        // Redirigir al índice de razas
        return redirect()->route('raza.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Raza $raza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $raza = raza::findOrFail($id);
        $tipo_mascotas = Tipo_Mascota::all();
        return view('raza.edit', compact('raza', 'tipo_mascotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Raza $raza)
    {
        $raza->raza = $request->raza;
        $raza->tipo_mascota_id = $request->tipo_mascota_id;
    
        $raza->save();
    
        return redirect()->route('raza.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $raza = raza::findOrFail($id);
        $raza->delete();
        return redirect()->route('raza.index')->with('success', 'Tipo de mascota eliminado exitosamente');
    }


    public function getRazasByTipoMascota($tipo_mascota_id)
    {
        // Obtener todas las razas basadas en el tipo de mascota proporcionado
        $razas = raza::where('tipo_mascota_id', $tipo_mascota_id)->get();
    
    
        // Devuelve las razas como JSON
        return response()->json($razas);
    }

}
