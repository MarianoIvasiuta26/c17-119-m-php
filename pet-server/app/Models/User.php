<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'role_id',
    ];

    //para establecer la relacion 1 a n con rol
    public function role(){
        return $this->belongsTo(Role::class);
    }

    //por la relacion 1 a 1 con person
    public function person(){
        return $this->hasOne(Person::class);
    }

    //Establecemos relación 1 a 1 con refugio
    public function refuge(){
        return $this->hasOne(Refuge::class);
    }

    //Establecemos relación 1 a n con mascotas
    public function pets(){
        return $this->hasMany(Pets::class);
    }

    //Establecemos relación 1 a n con adopciones
    public function adoptions(){
        return $this->hasMany(Adoption::class);
    }

    //Establecemos relación 1 a n con publicaciones
    public function publicationDetails(){
        return $this->hasMany(PublicationDetail::class);
    }

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
        'password' => 'hashed',
    ];
}
