<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static findOrFail(Consultorio $id)
 * @method static find($id)
 */
class Consultorio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ubicacion', 'capacidad', 'telefono', 'especialidad', 'is_active'];

public function doctores(){
    return $this->hasmany(Doctor::class);
}

public function horarios(){
    return $this->hasmany(Horario::class);
}
    public function events(){
        return $this->hasmany(Event::class);
    }
}
