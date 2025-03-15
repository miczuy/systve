<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermera extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_nacimiento' => 'datetime', // O 'date' si solo necesitas la fecha
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->where('status', true);
    }

}
