<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
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
        return $this->belongsTo(PetSatate::class, 'pet_state_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id');
    }
}
