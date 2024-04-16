<?php

namespace App\Http\Controllers\Adoption;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\PublicationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Inertia\Inertia;
use Ramsey\Uuid\Type\Integer;

class AdoptionController extends Controller
{
   // public function __construct()
   // {
   //     $this->middleware('auth'); // Aplica el middleware de autenticación
   // }

    public function index()
    {
        $adoptions = Adoption::all(); // Recupera todas las adopciones
        return Inertia::render('Adoption/Index', ['adoptions' => $adoptions]); // Renderiza la vista con las adopciones
        //return $adoptions;
    }

    public function create()
    {
        return Inertia::render('Adoption/Create'); // Renderiza la vista de creación de adopción
    }

    public function store(Request $request, $publication_detail_id)
    {
        //Buscamos la publicación corresondiente en la BD
        $detalle = PublicationDetail::findOrFail($publication_detail_id);
        
        $adoption = $this->createOrUpdateAdoption($request, $detalle); // Crea una nueva adopción
        return redirect()->route('adoption.index')->with($this->getSuccessOrErrorMessage($adoption)); // Redirige y muestra mensaje
    }

    public function show(string $id)
    {
        return $this->renderAdoptionView($id, 'Adoption/Edit'); // Muestra los detalles de una adopción
    }

    public function edit(string $id)
    {
        return $this->renderAdoptionView($id, 'Adoption/Edit'); // Muestra el formulario de edición de una adopción
    }

    public function update(Request $request, $id)
    {
        $adoption = $this->createOrUpdateAdoption($request, $id); // Actualiza una adopción
        return redirect()->route('adoption.index')->with($this->getSuccessOrErrorMessage($adoption)); // Redirige y muestra mensaje
    }

    public function destroy(string $id)
    {
        $adoption = Adoption::findOrFail($id); // Encuentra la adopción por ID
        $result = $adoption->delete(); // Elimina la adopción
        return redirect()->route('adoption.index')->with($this->getSuccessOrErrorMessage($result)); // Redirige y muestra mensaje
    }

    private function createOrUpdateAdoption(Request $request, $id = null, $detalle = null)
    {
        $validateDataAdoption = $request->validate([ // Valida los datos del formulario
            'pet_id' => 'required|integer',
            'user_id' => 'required|integer',
            'state' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($id) { // Si se proporciona un ID, actualiza la adopción existente
            $adoption = Adoption::findOrFail($id);
            $decision = $request->input('decision');
            $adoption->state($decision);
            $adoption->end_date = Date::now();
            $adoption->save();
            return $adoption;
        } else { // De lo contrario, crea una nueva adopción
            //Obtenemos el id del usuario autenticado
            $user = auth()->user()->id;
            return Adoption::create([
                'pet_id' => $detalle->pet_id,
                'user_id' => $user->id,
                'state' => 'En proceso',
                'start_date' => Date::now(),
                'end_date' => null,
            ]);
        }
    }

    private function renderAdoptionView(string $id, string $view)
    {
        $adoption = Adoption::findOrFail($id); // Encuentra la adopción por ID
        return Inertia::render($view, ['adoption' => $adoption]); // Renderiza la vista con la adopción
    }

    private function getSuccessOrErrorMessage($result)
    {
        if ($result) { // Si la operación fue exitosa
            return ['success' => 'Operación realizada exitosamente'];
        } else { // Si hubo un error
            return ['error' => 'Ocurrió un error al realizar la operación'];
        }
    }
}


/** 
*class AdoptionController extends Controller
*{
*    // Creamos un contructor para ferificar que el usuario este logueado para poder crealizar el crud,
*    /caso contrario lo regresa al formulario de login 
*    
*
*    public function __construct()
*    {
*        $this->middleware('auth');
*    }
*    //
*     /Display a listing of the resource.
*     /
*    public function index()
*    {
*        //Obtenemos los registros de la BD
*        $adoptions = Adoption::all();
*        return Inertia::render('Adoption/Index', ['adoptions' => $adoptions]);
*        
*    }
*
*    //
*     // Show the form for creating a new resource.
*     //
*    public function create()
*    {
*        return Inertia::render('Adoption/Create');
*    }
*
*    //
*     // Store a newly created resource in storage.
*     //
*    public function store(Request $request)
*    {
*        // reglas de validación
*        $validateDataAdoption = $request->validate([
*            'pet_id' => 'required|integer',
*            'user_id' => 'required|integer',
*            'state' => 'required|string|max:255',
*            'start_date' => 'required|date',
*            'end_date' => 'required|date|after_or_equal:start_date',
*        ]);
*
*        // crea la adopción con los datos validados
*        $adoption = Adoption::create($validateDataAdoption);
*
*        if ($adoption) {
*            return redirect()->route('adoption.index')->with('success', 'Solicitud de adopción creada exitosamente');
*        } else {
*            return redirect()->route('adoption.index')->with('error', 'A ocurrido un error al crear el registro');
*        }
*    }
*
*    //
*     //Display the specified resource.
*     //
*    public function show(string $id)
*    {
*        $adoption = Adoption::findOrFail($id); // busca en la db una adopción que coincida con $id
*
*        if (!$adoption){
*            return redirect()->route('adoption.index')->with('error', 'Registro no encontrado');
*        }
*        return Inertia::render('Adoption/Edit', ['adoption' => $adoption]); // retorna los datos para generar la vista
*    }
*
*    ///
*     //Show the form for editing the specified resource.
*     //
*    public function edit(string $id)
*    {
*        $adoption = Adoption::findOrFail($id); // busca en la db una adopción que coincida con $id
*
*        if (!$adoption){
*            return redirect()->route('adoption.index')->with('error', 'Registro no encontrado');
*        }
*        return Inertia::render('Adoption/Edit', ['adoption' => $adoption]);
*    }
*
*    //
*     // Update the specified resource in storage.
*     //
*    public function update(Request $request, string $id)
*    {
*        // validamos los datos
*        $validateDataAdoption = $request->validate([
*            'pet_id' => 'required|integer',
*            'user_id' => 'required|integer',
*            'state' => 'required|string|max:255',
*            'start_date' => 'required|date',
*            'end_date' => 'required|date|after_or_equal:start_date',
*        ]);
*
*        // busca la adopcion especifica y actualiza los datos
*        $adoption = Adoption::findOrFail($id);
*        if ($adoption){
*            $adoption->update($validateDataAdoption);
*            return redirect()->route('adoption.index')->with('success', 'Adopción actualizada exitosamente');
*        } else {
*            return redirect()->route('adoption.index')->with('error', 'Registro no encontrado');
*        }
*    }
*
*    //
*    // Remove the specified resource from storage.
*     //
*    public function destroy(string $id)
*    {
*        $adoption = Adoption::findOrFail($id);// buscamo el registro a eliminar
*        if ($adoption){
*            $adoption->delete(); // eliminamos el registro
*            return redirect()->route('adoption.index')->with('success','Adopción eliminada exitosamente');
*        } else {
*            return redirect()->route('adoption.index')->with('Registro no encontrado');
*        }
*    }
*}
*/