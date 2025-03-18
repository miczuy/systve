<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles,HasApiTokens,HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status', // Agregado
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function enfermeras()
    {
        return $this->hasMany(Enfermera::class)->whereHas('user', function ($query) {
            $query->where('status', true);
        });
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class)->whereHas('user', function ($query) {
            $query->where('status', true);
        });
    }

    public function event()
    {
        return $this->hasMany(Event::class)->whereHas('user', function ($query) {
            $query->where('status', true);
        });
    }

    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }



}
