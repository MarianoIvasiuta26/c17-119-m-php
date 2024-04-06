<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domicile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'latitude',
        'longitude',
        'country',
        'province',
        'city',
        'postal_code',
        'address',
    ];

    //Establecemos relación uno a uno con refugio
    public function refuge()
    {
        return $this->hasOne(Refuge::class);
    }

    //Establecemos relación uno a uno con persona
    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
