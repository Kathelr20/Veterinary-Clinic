<?php

namespace App\Http\Controllers;

use App\Models\Tipo_estetica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TipoEsteticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_estetica = Tipo_estetica::all();
        return view('tipo_estetica.index',compact('tipo_estetica'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_estetica.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo_estetica = new Tipo_estetica();
        $tipo_estetica->nombre = $request->nombre;
    
        $tipo_estetica->save();
        return Redirect::route('tipo_estetica.index')->with('success', 'Tipo de mascota creado exitosamente');
        }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_estetica $tipo_estetica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tipo_estetica)
    {
        $tipo_estetica = Tipo_estetica::find($tipo_estetica);
        return view('tipo_estetica.edit',['nombre'=>$tipo_estetica]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tipo_estetica)
    {
        $tipo_estetica = Tipo_estetica::find($tipo_estetica);
        $tipo_estetica->nombre = $request->nombre;

        $tipo_estetica->save();
        return Redirect::route('tipo_estetica.index')->with('success', 'Tipo de mascota actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo_estetica = Tipo_estetica::findOrFail($id);
        $tipo_estetica->delete();
        return redirect()->route('tipo_estetica.index')->with('success', 'Tipo de mascota eliminado exitosamente');
    }
}
