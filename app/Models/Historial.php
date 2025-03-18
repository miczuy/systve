<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle', 'fecha_visita', 'paciente_id', 'doctor_id', 'mascota_id', 'tipo_paciente'
    ];

    protected $casts = [
        'fecha_visita' => 'date',
        'tipo_paciente' => 'string',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    // Método para determinar si es historial de mascota
    public function esMascota()
    {
        return $this->tipo_paciente === 'Mascota';
    }
}
