<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas_generales extends Model
{
    use HasFactory;

    protected $table = 'citas_generales';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'mascota_id',
        'personal_id',
        'fecha',
        'hora',
        'valor',
    ];

    // Relación con la tabla 'mascotas'
    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    // Relación con la tabla 'personals'
    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
}
