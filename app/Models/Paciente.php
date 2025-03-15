<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public static function find($id)
    {
    }

    public function historial(){
    return $this->hasMany(Historial::class);
    }

}
