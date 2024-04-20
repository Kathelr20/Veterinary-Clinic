<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'tipo_mascota_id',
        'tipo_raza_id',
        'nombre',
        'años',
        'foto',
        'dueño',
        'tel',
        'correo',
    ];

    public function tipoMascota()
    {
        return $this->belongsTo(tipo_mascota::class, 'tipo_mascota_id');
    }

    public function raza()
    {
        return $this->belongsTo(raza::class, 'raza_id');
    }

}
