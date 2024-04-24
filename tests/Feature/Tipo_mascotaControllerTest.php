<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Tipo_mascota;
use App\Http\Controllers\TipoMascotaController;

class AnimalControllerTest extends TestCase
{
    public function test_get_animal_by_id()
    {
        $animal = Tipo_mascota::factory()->create([
            'id' => 1,
            'mascota' => 'Fido',
        ]);
        $controller = new TipoMascotaController();


        $result = $controller->getAnimalById(1);


        $this->assertEquals($animal->id, $result->id);
        $this->assertEquals($animal->mascota, $result->mascota);
    }
}
