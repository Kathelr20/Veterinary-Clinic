<?php

namespace App\Http\Controllers;

use App\Models\Citas_esteticas;
use App\Models\Mascota;
use App\Models\Personal;
use App\Models\Tipo_estetica;
use Illuminate\Http\Request;


class CitasEsteticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Citas_esteticas::all();
        return view('citasesteticas.index',compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mascotas = Mascota::all();
        $personal = Personal::all();
        $tiposEstetica = Tipo_estetica::all();
        return view('citasesteticas.create',compact('mascotas','personal','tiposEstetica'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'personal_id' => 'required|exists:personals,id',
            'tipo_estetica_id' => 'required|exists:tipo_esteticas,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'valor' => 'required|numeric|min:0',
        ]);

        $conflicto = Citas_esteticas::where('fecha',$request->fecha)
            ->where('hora',$request->hora)
            ->where(function ($query) use ($request){
                $query->where('mascota_id', $request->mascota_id)
                    ->orWhere('personal_id',$request->personal_id);
            })
            ->exists();
        if ($conflicto){
            return redirect()->back()->withErrors(['error' => 'Ya existe una cita con la misma fecha y hora para la mascota o el personal especificado.']);
        }


        $nuevacita = Citas_esteticas::create([
            'mascota_id' => $request->mascota_id,
            'personal_id' => $request->personal_id,
            'tipo_estetica_id' => $request->tipo_estetica_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'valor' => $request->valor,
        ]);

        return redirect()->route('citaestetica.index', $nuevacita)->with('success', 'Cita estética creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Citas_esteticas $citas_esteticas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cita = Citas_esteticas::findOrFail($id);

        return view('citasesteticas.edit', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        // Valida solo los campos de fecha, hora y valor
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i:s',
            'valor' => 'required|numeric|min:0',
        ]);
    
        // Encuentra la cita estética por su ID
        $cita = Citas_esteticas::findOrFail($id);
    
        // Actualiza solo los campos fecha, hora y valor
        $cita->update([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'valor' => $request->valor,
        ]);
    
        // Redirige con un mensaje de éxito
        return redirect()->route('citaestetica.index', $cita)->with('success', 'Cita estética actualizada con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy($id)
    {
        // Encuentra la cita estética por su ID y asegúrate de que es un objeto Eloquent
        $cita = Citas_esteticas::findOrFail($id);
    
        // Eliminar la cita estética específica de la base de datos
        $cita->delete();
    
        // Redirigir a la lista de citas estéticas con un mensaje de éxito
        return redirect()->route('citaestetica.index')->with('success', 'Cita estética eliminada con éxito.');
    }
}
