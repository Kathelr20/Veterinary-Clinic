<?php

namespace App\Http\Controllers;

use App\Models\Tipo_mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TipoMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_mascota = Tipo_mascota::all();
        return view('tipo_mascota.index', compact('tipo_mascota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo_mascota = new Tipo_mascota(); // Ajusta el nombre del modelo si es necesario
        $tipo_mascota->mascota = $request->mascota;
    
        $tipo_mascota->save();
        return Redirect::route('tipo_mascota.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_mascota $tipo_mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tipo_mascota)
    {

        $mascota = Tipo_mascota::find($tipo_mascota);
        return view('tipo_mascota.edit',['mascota'=>$mascota]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tipo_mascota)
    {
        $mascota = Tipo_mascota::find($tipo_mascota);
        $mascota->mascota = $request->mascota;

        $mascota->save();
        return Redirect::route('tipo_mascota.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo_mascota = Tipo_Mascota::findOrFail($id);
        $tipo_mascota->delete();
        return redirect()->route('tipo_mascota.index')->with('success', 'Tipo de mascota eliminado exitosamente');
    }
}
