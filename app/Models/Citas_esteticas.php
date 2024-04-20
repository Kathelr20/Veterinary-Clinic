<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas_esteticas extends Model
{
    use HasFactory;

    protected $fillable = [
        'mascota_id',
        'personal_id',
        'tipo_estetica_id',
        'fecha',
        'hora',
        'valor',
    ];



    public function mascota()
    {
        return $this->hasOne(Mascota::class, 'id', 'mascota_id');
    }

    public function personal()
    {
        return $this->hasOne(Personal::class, 'id', 'personal_id');
    }

    public function tipoestetica()
    {
        return $this->hasOne(Tipo_estetica::class, 'id', 'tipo_estetica_id');
    }
}
