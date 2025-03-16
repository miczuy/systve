<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'correo',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'sexo',
        'edad',
        'ocupacion',
        'estado_civil',
        'ocupacion_actual',
        'user_id'  // Importante incluir user_id
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function historial(){
    return $this->hasMany(Historial::class);
    }

    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
