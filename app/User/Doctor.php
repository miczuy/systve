<?php

namespace App\Models;
namespace App\User;

use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombres','apellidos','telefono','licencia_medica','especialidad','user_id'];


    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
    public function horario(){
        return $this->hasMany(Horario::class); // la relacion es de 1 a muchos en horarios
    }

    public function user(){
        return $this->belongsTo(User::class); // la relacion es de 1 a 1 por eso se nombra belongsTo
    }
}
