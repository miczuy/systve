<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacunaMascota extends Model
{
    use HasFactory;

    protected $table = 'vacunas_mascota';

    protected $fillable = [
        'mascota_id', 'nombre_vacuna', 'fecha_aplicacion',
        'fecha_proxima', 'lote', 'veterinario', 'notas'
    ];

    protected $casts = [
        'fecha_aplicacion' => 'date',
        'fecha_proxima' => 'date',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }
}
