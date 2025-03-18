<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'start',
        'end',
        'color',
        'user_id',
        'doctor_id',
        'consultorio_id',
        'estado'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    /**
     * Obtiene el usuario asociado al evento.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtiene el doctor asociado al evento.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Obtiene el consultorio asociado al evento.
     */
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }
    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }
    public function mascota()
    {
        return $this->belongsTo(\App\Models\Mascota::class);
    }


}
