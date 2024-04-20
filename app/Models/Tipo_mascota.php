<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_mascota extends Model
{
    use HasFactory;

    protected $fillable =  ['mascota'];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class, 'tipo_mascota_id');
    }

    public function razas()
    {
        return $this->hasMany(Raza::class);
    }

}
