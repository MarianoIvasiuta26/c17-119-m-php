<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Refuge extends Model
{
    use HasFactory, SoftDeletes; //Permite un borrado lógico sin perder los registros de la BD.

    protected $fillable = [
        'name_refuge',
        'phone',
        'domicile_id',
        'user_id',
    ];

    //Establecemos relación uno a uno con domicilio
    public function domicile()
    {
        return $this->belongsTo(Domicile::class);
    }

    //Establecemos relación uno a uno con usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
