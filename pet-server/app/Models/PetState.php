<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetState extends Model
{
    use HasFactory;

    protected $table = 'pet_states';

    protected $fillable = [
        'state'
    ];

    //Establecemos relación uno a muchos con mascotas
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
