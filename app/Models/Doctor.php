<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombres','apellidos','telefono','licencia_medica','especialidad','user_id'];

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios (){
        return $this->hasMany(Horario::class);
}

    public function user()
    {
        return $this->belongsTo(User::class)->where('status', true);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class, 'doctor_specialty');
    }
    public function events (){
        return $this->hasMany(Event::class);
    }

    public function historial(){
    return $this->hasMany(Historial::class);
    }

    public function mascotas()
    {
        return $this->belongsToMany(Mascota::class, 'visitas_mascota', 'doctor_id', 'mascota_id')
            ->withPivot('fecha_visita', 'specialty_id')
            ->withTimestamps();
    }

    public function visitasMascotas()
    {
        return $this->hasMany(VisitaMascota::class);
    }

}
