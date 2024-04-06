<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSate extends Model
{
    use HasFactory;

    protected $table = 'pet_states';

    protected $fillable = [
        'state'
    ];
}
