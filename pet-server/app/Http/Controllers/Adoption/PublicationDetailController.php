<?php

namespace App\Http\Controllers\Adoption;

use App\Http\Controllers\Controller;
use App\Models\PublicationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;

class PublicationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publication = PublicationDetail::all();
        return Inertia::render('PublicationDetail/Index', ['publicationDetail' => $publication]);
        //return $publication;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('PublicationDetail/Create'); // Renderiza la vista de creación de detalle de publicación
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $publication_detail_id)
    {
        // Buscamos la Publicacion den la BD
        $detail = PublicationDetail::classfindOrFail($publication_detail_id);

        $publication = $this->createOrUpdatePublication($request, $detail); // Crea una nueva publicacíon
        return redirect()->route('publicationDetail.index')->with($this->getSuccessOrErrorMessage($publication)); // Redirige y muestra mensaje de exito o error
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->renderPublicationView($id, 'PublicationDetail/Edit'); // Muestra los detalles de una publicación
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->renderPublicationView($id, 'PublicationDetail/Edit'); // Muestra el formulario de edicion de Publicación
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publication = $this->createOrUpdateAdoption($request, $id); // actualiza una adopción
        return redirect()->route('publicationDetail.index')->with(($this->getSuccessOrErrorMessage($publication))); // Redirige y muestra el mensaje
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,)
    {
        // Buscamos la Publicacion den la BD
        $publication = PublicationDetail::classfindOrFail($id);
        $result = $publication->delete(); // elimina la publicación
        return redirect()->route('publicationDetail.index')->with($this->getSuccessOrErrorMessage($result)); // Redirige y muestra mensaje
    }

    private function createOrUpdateAdoption(Request $request, $id = null, $detail = null)
    {
        $validatePublicationDetail = $request ->validate([ // valida los datos del formulario
            'pet_id' => 'required|integer',
            'user_id' => 'required|integer',
            'publication_date' => 'required|date',
            'description' => 'required|string|max:255',
            'state' => 'required|in:[Sin Solicitud,En proceso,Aprobado,Rechazado]'
        ]);

        if ($id) { // Si se proporciona un ID, se actualiza la Publicacion existente
            $publication = PublicationDetail::findOrFail($id);
            $publication->pet_id = $request->pet_id;
            $publication->user_id = $request->user_id;
            $publication->publication_date = $request->publication_date;
            $publication->desctiption = $request->description;
            $publication->state = $request->state;

            $publication->save();
            return $publication;
        } else { // De lo contrario, crea una nueva publicación
            // Obtenemos el id del ususario autenticado
            $user = auth()->user()->id;
            return PublicationDetail::create([
                'pet_id' => $detail->pet_id,
                'user_id' => $user->id,
                'description' => $detail->description,
                'state' => 'Sin solicitud',
            ]);

        }
    }

    private function renderPublicationView(string $id, string $view)
    {
        $publication = PublicationDetail::findOrFail($id); // Buscamos la publicación de ID
        return Inertia::render($view, ['publicationDetail' => $publication]);// Renderiza la vista de Publicación
    }

    private function getSuccessOrErrorMessage($result)
    {
        if ($result) { // Si la operacion fué exitosa
            return ['success' => 'Operación realizada exitosamente'];
        } else { // Si hubo un error
            return ['success' => 'Ocurrió un error al realizar la operación'];
        }
    }
}
