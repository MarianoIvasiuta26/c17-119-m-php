<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected  $fillable = [
        'last_name',
        'name',
        'user_id',
        'domicile_id',
        'phone',
    ];

    //Establecemos relación uno a uno con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Establecemos relación uno a uno con domicilio
    public function domicile()
    {
        return $this->belongsTo(Domicile::class);
    }
}
