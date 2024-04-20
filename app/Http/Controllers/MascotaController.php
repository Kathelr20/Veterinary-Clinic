<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\raza;
use App\Models\Tipo_mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $tiposMascotas = Tipo_mascota::all();
        $mascotas = Mascota::with(['raza', 'tipoMascota'])->get();
        return view('mascotas.index', compact('mascotas','tiposMascotas'));
    }



    public function create(Request $request)
    {
        // Obtener todos los tipos de mascota
        $tipos_mascotas = Tipo_mascota::all();
        
        // Inicializar las razas
        $razas = collect(); // Establecer a un objeto de colección vacío
        $selected_tipo_mascota = null;
    
        // Si hay un tipo de mascota seleccionado
        if ($request->has('tipo_mascota_id')) {
            $selected_tipo_mascota = $request->input('tipo_mascota_id');
            
            // Obtener razas de acuerdo con el tipo de mascota seleccionado
            $razas = raza::where('tipo_mascota_id', $selected_tipo_mascota)->get();
        }
    
        // Pasar datos a la vista
        return view('mascotas.create', compact('tipos_mascotas', 'razas', 'selected_tipo_mascota'));
    }
    

    public function store(Request $request)
    {
        // Validación de datos de entrada
        $validatedData = $request->validate([
            'tipo_mascota_id' => 'required|exists:tipo_mascotas,id',
            'raza_id' => 'required|exists:razas,id',
            'identificacion' => 'required|string|max:255|unique:mascotas,identificacion',
            'nombre' => 'required|string|max:255',
            'años' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dueño' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'correo' => 'required|email|max:255',
        ]);

        // Crear nueva mascota con los datos validados
        $mascota = new Mascota();
        $mascota->identificacion = $request->identificacion;
        $mascota->nombre = $request->nombre;
        $mascota->años = $request->años;
        $mascota->dueño = $request->dueño;
        $mascota->tel = $request->tel;
        $mascota->correo = $request->correo;
        $mascota->tipo_mascota_id = $request->tipo_mascota_id;
        $mascota->raza_id = $request->raza_id;

        // Guardar la foto si se proporciona
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $mascota->foto = $path;
        }

        // Guardar la mascota en la base de datos
        $mascota->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('mascotas.index')->with('success', 'Mascota creada con éxito.');
    }

    public function edit(Mascota $mascota)
    {

        // Devuelve la vista de edición, pasando la mascota a editar, los tipos de mascotas y las razas
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        // Validación de datos de entrada
        $validatedData = $request->validate([
            'identificacion' => 'required|string|max:255|unique:mascotas,identificacion,' . $mascota->id,
            'nombre' => 'required|string|max:255',
            'años' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dueño' => 'required|string|max:255',
            'tel' => 'required|string|max:15',
            'correo' => 'required|email|max:255',
        ]);

        // Actualizar los datos de la mascota
        $mascota->identificacion = $request->identificacion;
        $mascota->nombre = $request->nombre;
        $mascota->años = $request->años;
        $mascota->dueño = $request->dueño;
        $mascota->tel = $request->tel;
        $mascota->correo = $request->correo;

        // Actualizar la foto si se proporciona
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('fotos', 'public');
            $mascota->foto = $path;
        }

        // Guardar los cambios en la mascota
        $mascota->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada con éxito.');
    }

    public function destroy(Mascota $mascota)
    {
        // Eliminar la mascota de la base de datos
        $mascota->delete();

        // Redirigir a la lista de mascotas con un mensaje de éxito
        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada con éxito.');
    }

    
    public function show($id, Request $request)
    {
        $mascota = Mascota::findOrFail($id); // Busca la mascota por ID
        $from = $request->input('from'); // Recupera el parámetro 'from' de la URL
    
        return view('mascotas.show', compact('mascota', 'from'));
    }



}

