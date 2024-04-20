<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raza extends Model
{
    use HasFactory;

    protected $fillable = ['raza', 'tipo_mascota_id'];

    public function tipoMascota()
    {
        return $this->belongsTo(Tipo_mascota::class, 'tipo_mascota_id');
    }

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'tipo_raza_id');
    }

    public function tipo_mascota()
    {
        return $this->belongsTo(Tipo_mascota::class);
    }

}
