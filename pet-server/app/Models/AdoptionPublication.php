<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdoptionPublication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'publication_detail_id',
    ];

    //Establecemos relación uno a uno con detalles de publicación
    public function publicationDetail()
    {
        return $this->belongsTo(PublicationDetail::class);
    }
}
