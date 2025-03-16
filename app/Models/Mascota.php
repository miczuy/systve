<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mascota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mascotas';

    protected $fillable = [
        'paciente_id', 'nombre', 'especie', 'raza', 'color', 'sexo',
        'fecha_nacimiento', 'peso', 'caracteristicas_especiales',
        'esterilizado', 'microchip', 'alergias', 'condiciones_medicas',
        'medicacion_actual', 'foto', 'estado'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'esterilizado' => 'boolean',
    ];

    // Relación con el paciente (dueño)
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Relación con las vacunas
    public function vacunas()
    {
        return $this->hasMany(VacunaMascota::class);
    }

    // Relación con las desparasitaciones
    public function desparasitaciones()
    {
        return $this->hasMany(DesparasitacionMascota::class);
    }

    // Relación con las visitas (historial clínico)
    public function visitas()
    {
        return $this->hasMany(VisitaMascota::class);
    }

    // Relación con historiales del modelo existente
    public function historiales()
    {
        return $this->hasMany(Historial::class);
    }

    // Relación con doctores a través de visitas
    public function doctores()
    {
        return $this->belongsToMany(Doctor::class, 'visitas_mascota', 'mascota_id', 'doctor_id')
            ->withPivot('fecha_visita', 'specialty_id')
            ->withTimestamps();
    }

    // Calcular edad en años y meses
    public function getEdadAttribute()
    {
        if (!$this->fecha_nacimiento) {
            return null;
        }

        $fechaNacimiento = $this->fecha_nacimiento;
        $hoy = now();

        $años = $fechaNacimiento->diffInYears($hoy);
        $meses = $fechaNacimiento->copy()->addYears($años)->diffInMonths($hoy);

        if ($años > 0) {
            return $años . ' ' . ($años == 1 ? 'año' : 'años') .
                ($meses > 0 ? ', ' . $meses . ' ' . ($meses == 1 ? 'mes' : 'meses') : '');
        }

        return $meses . ' ' . ($meses == 1 ? 'mes' : 'meses');
    }

    // Próxima vacuna pendiente
    public function getProximaVacunaAttribute()
    {
        return $this->vacunas()
            ->where('fecha_proxima', '>=', now())
            ->orderBy('fecha_proxima', 'asc')
            ->first();
    }

    // Próxima desparasitación pendiente
    public function getProximaDesparasitacionAttribute()
    {
        return $this->desparasitaciones()
            ->where('fecha_proxima', '>=', now())
            ->orderBy('fecha_proxima', 'asc')
            ->first();
    }
}
