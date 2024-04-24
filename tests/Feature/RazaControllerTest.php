<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Raza;
use App\Http\Controllers\RazaController;

class RazaControllerTest extends TestCase
{
    public function test_get_raza_by_id()
    {
        // Crear una raza de ejemplo en la base de datos
        $raza = Raza::factory()->create([
            'id' => 1,
            'raza' => 'Golden Retriever',
            'tipo_mascota_id' => 1, // Aquí deberías poner el ID de un tipo de mascota válido
            // Otros atributos de la raza...
        ]);

        // Crear una instancia del controlador de razas
        $controller = new RazaController();

        // Llamar a la función getRazaById con el ID de la raza creada
        $result = $controller->getRazaById(1);

        // Verificar que la raza devuelta sea la misma que la raza creada
        $this->assertEquals($raza->id, $result->id);
        $this->assertEquals($raza->raza, $result->raza);
        $this->assertEquals($raza->tipo_mascota_id, $result->tipo_mascota_id);
        // Verificar otros atributos de la raza si es necesario...
    }
}


