<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesparasitacionMascota extends Model
{
    use HasFactory;

    protected $table = 'desparasitaciones_mascota';

    protected $fillable = [
        'mascota_id', 'medicamento', 'fecha_aplicacion',
        'fecha_proxima', 'peso_aplicacion', 'notas'
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
