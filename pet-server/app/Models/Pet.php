<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model{
    use HasFactory;

    protected $table = 'pets';

    protected $fillable = [
        'user_id',
        'pet_state_id',
        'animal_id',
        'name',
        'age',
        'color',
        'race',
        'size',
        'description',
        'image'
    ];

    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function petStateId()
    {
        return $this->belongsTo(PetState::class, 'pet_state_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }

    //Establecemos relación uno a muchos con adopciones
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    //Establecemos relación uno a n con publicaciones
    public function publicationDetails()
    {
        return $this->hasMany(PublicationDetail::class);
    }

}
