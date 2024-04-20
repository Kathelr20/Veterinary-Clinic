<?php

namespace App\Http\Controllers;

use App\Models\Citas_generales;
use App\Models\Mascota;
use App\Models\Personal;
use Illuminate\Http\Request;

class CitasGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Citas_generales::all();
        return view('citasgeneral.index',compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mascotas = Mascota::all();
        $personal = Personal::all();
        return view('citasgeneral.create',compact('mascotas','personal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'personal_id' => 'required|exists:personals,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'valor' => 'required|numeric|min:0',
        ]);

        $conflicto = Citas_generales::where('fecha',$request->fecha)
            ->where('hora',$request->hora)
            ->where(function ($query) use ($request){
                $query->where('mascota_id', $request->mascota_id)
                    ->orWhere('personal_id',$request->personal_id);
            })
            ->exists();
        if ($conflicto){
            return redirect()->back()->withErrors(['error' => 'Ya existe una cita con la misma fecha y hora para la mascota o el personal especificado.']);
        }


        $nuevacita = Citas_generales::create([
            'mascota_id' => $request->mascota_id,
            'personal_id' => $request->personal_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'valor' => $request->valor,
        ]);

        return redirect()->route('citageneral.index', $nuevacita)->with('success', 'Cita General creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Citas_generales $citas_generales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cita = Citas_generales::findOrFail($id);

        return view('citasgeneral.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // Valida solo los campos de fecha, hora y valor
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i:s',
            'valor' => 'required|numeric|min:0',
        ]);
    
        // Encuentra la cita estética por su ID
        $cita = Citas_generales::findOrFail($id);
    
        // Actualiza solo los campos fecha, hora y valor
        $cita->update([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'valor' => $request->valor,
        ]);
    
        // Redirige con un mensaje de éxito
        return redirect()->route('citageneral.index', $cita)->with('success', 'Cita General actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra la cita estética por su ID y asegúrate de que es un objeto Eloquent
        $cita = Citas_generales::findOrFail($id);
    
        // Eliminar la cita estética específica de la base de datos
        $cita->delete();
    
        // Redirigir a la lista de citas estéticas con un mensaje de éxito
        return redirect()->route('citageneral.index')->with('success', 'Cita General eliminada con éxito.');
    }
}
