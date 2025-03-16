<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaMascota extends Model
{
    use HasFactory;

    protected $table = 'visitas_mascota';

    protected $fillable = [
        'mascota_id', 'doctor_id', 'specialty_id', 'fecha_visita', 'hora_visita',
        'peso', 'temperatura', 'motivo_consulta', 'sintomas',
        'diagnostico', 'tratamiento', 'observaciones',
        'fecha_seguimiento', 'estado'
    ];

    protected $casts = [
        'fecha_visita' => 'date',
        'hora_visita' => 'datetime:H:i',
        'fecha_seguimiento' => 'date',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    // Método para convertir a historial
    public function toHistorial()
    {
        $detalle = "Motivo: {$this->motivo_consulta}\n";

        if ($this->sintomas)
            $detalle .= "Síntomas: {$this->sintomas}\n";

        if ($this->diagnostico)
            $detalle .= "Diagnóstico: {$this->diagnostico}\n";

        if ($this->tratamiento)
            $detalle .= "Tratamiento: {$this->tratamiento}\n";

        if ($this->observaciones)
            $detalle .= "Observaciones: {$this->observaciones}";

        return Historial::create([
            'detalle' => $detalle,
            'fecha_visita' => $this->fecha_visita,
            'doctor_id' => $this->doctor_id,
            'paciente_id' => $this->mascota->paciente_id,
            'mascota_id' => $this->mascota_id,
            'tipo_paciente' => 'Mascota'
        ]);
    }
}
