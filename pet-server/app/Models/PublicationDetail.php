<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicationDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pet_id',
        'user_id',
        'publication_date',
        'description',
        'state',
    ];

    //Establecemos relación 1 a n con mascota
    public function pet()
    {
        return $this->belongsTo(Pets::class);
    }

    //Establecemos relación 1 a n con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Establecemos relación 1 a 1 con publicación de adopción
    public function adoptionPublication()
    {
        return $this->hasOne(AdoptionPublication::class);
    }
}
