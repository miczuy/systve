<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function doctor()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_specialty');
    }
}

