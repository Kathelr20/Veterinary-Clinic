<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidad = Especialidad::all();
        return view('especialidades.index',compact('especialidad'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $especialidad = new Especialidad();
        $especialidad->especialidad = $request->especialidad;

        $especialidad->save();
        return Redirect::route('especialidad.index')->with('success', 'Especialidad creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($especialidad)
    {
        $especialidad = Especialidad::find($especialidad);
        return view('especialidades.edit',['especialidad'=>$especialidad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $especialidad)
    {
        $especialidad = Especialidad::find($especialidad);
        $especialidad->especialidad = $request->especialidad;

        $especialidad->save();
        return Redirect::route('especialidad.index')->with('success', 'Especialidad actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();
        return redirect()->route('especialidad.index')->with('success', 'Especialidad eliminada exitosamente');
    }
}
