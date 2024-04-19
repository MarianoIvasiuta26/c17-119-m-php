<?php

namespace App\Http\Controllers\Adoption;

use App\Http\Controllers\Controller;
use App\Models\PublicationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class PublicationDetailController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            return 'Obteniendo una publicación desde el controlador';
        } else {
            return 'Obteniendo lista de publicaciones desde el controlador';
        }
    }

    public function store($id)
    {
        return 'Creando una nueva publicación';
    }

    public function update($id)
    {
        return 'Actualizando una publicación';
    }
}
