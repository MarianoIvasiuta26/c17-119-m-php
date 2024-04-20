<?php

namespace App\Http\Controllers\Adoption;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use App\Models\Pet;
use App\Models\PetState;
use App\Models\PublicationDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AdoptionController extends Controller
{
   // public function __construct()
   // {
   //     $this->middleware('auth'); // Aplica el middleware de autenticación
   // }

    public function index()
    {
        $adoptions = Adoption::all(); // Recupera todas las adopciones
        $pets = Pet::all(); // Recupera todas las mascotas
        $users  = User::all(); // Recupera todos los usuarios
        return response()->json(['adoptions' => $adoptions, 'pets' => $pets, 'users' => $users]); // Retorna un JSON con las adopciones, mascotas y usuarios
    }

    public function create()
    {
        //En esta función llamamos el formulario para comenzar el proceso de adopción
        //¿O la llamamos desde la vista nomás?
    }

    /* MÉTODO PARA CUANDO ESTÉ IMPLEMENTADA TODO 

    public function store(Request $request, $publication_detail_id)
    {
        //Buscamos la publicación corresondiente en la BD
        $detalle = PublicationDetail::findOrFail($publication_detail_id);

        if(!$detalle){
            return response()->json(['error' => 'Publicación no encontrada'], 404);
        }
        
        $adoption = $this->createOrUpdateAdoption($request, $detalle); // Crea una nueva adopción

        return response()->json($this->getSuccessOrErrorMessage($adoption)); // Redirige y muestra mensaje
    }
    */

    public function store(Request $request)
    {
        $adoption = $this->createOrUpdateAdoption($request); // Crea una nueva adopción

        return response()->json($this->getSuccessOrErrorMessage($adoption)); // Redirige y muestra mensaje
    }

    public function show(string $id)
    {
        //Función para consultar el estado y la info del proceso de adopción
        $myAdoption = Adoption::findOrFail($id); // Encuentra la adopción por ID

        if(!$myAdoption){
            return response()->json(['error' => 'No se encontró la adopción'], 404);
        }

        //Obtenemos el id del usuario que solicitó la adopción
        $user = User::findOrFail($myAdoption->user_id); // Encuentra el usuario por ID

        //Obtenemos la mascota correspondiente
        $pet = Pet::findOrFail($myAdoption->pet_id); // Encuentra la mascota por ID

        return response()->json(['adoption' => $myAdoption, 'user' => $user, 'pet' => $pet]); // Retorna un JSON con la adopción
    }

    public function edit(string $id)
    {
        //Función para editar el estado del proceso de adopción
        //Lo usaría el refugio para actualizar el estado

        $adoption = Adoption::findOrFail($id); // Encuentra la adopción por ID
        return response()->json($adoption); // Retorna un JSON con la adopción
    }

    public function update(Request $request, $id)
    {
        $adoption = $this->createOrUpdateAdoption($request, $id); // Actualiza una adopción
        return response()->json($this->getSuccessOrErrorMessage($adoption)); // Redirige y muestra mensaje
    }

    public function destroy(string $id)
    {
        //Eliminamos con softdeletes
        $adoption = Adoption::findOrFail($id); // Encuentra la adopción por ID
        $result = $adoption->delete(); // Elimina la adopción
        return response()->json($this->getSuccessOrErrorMessage($result)); // Redirige y muestra mensaje
    }

    /*
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

            //Si la decisión fué aceptada, se actualiza el estado de la mascota correspondiente
            if($decision == 'Aceptada'){
                $pet = Pet::findOrFail($adoption->pet_id);
                $state = PetState::where('state', 'Adoptado')->first();
                $pet->state = $state->id;
                $pet->save();
            }

            return $adoption;
        } else { 
            // De lo contrario, crea una nueva adopción
            //Obtenemos el id del usuario autenticado
            //$user = auth()->user()->id; --> DESCOMENTAR CUANDO SE IMPLEMENTE CON LA VISTA Y ANDE EL LOGIN
            $user = User::findOrFail($request->user_id); //BORRAR CUANDO SE IMPLEMENTE EL DE ARRIBA
            $pet = Pet::findOrFail($detalle->pet_id);

            if(!$user){
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            return Adoption::create([
                'pet_id' => $pet->id,
                'user_id' => $user->id, 
                'state' => 'En proceso',
                'start_date' => Date::now(),
                'end_date' => null,
            ]);
        }
    }
    */

    private function createOrUpdateAdoption(Request $request, $id = null)
    {
        $validateDataAdoption = $request->validate([ // Valida los datos del formulario
            'pet_id' => 'integer',
            'user_id' => 'integer',
        ]);

        if ($id) { // Si se proporciona un ID, actualiza la adopción existente
            $adoption = Adoption::findOrFail($id);
            $adoption->state = $request->state;
            $adoption->end_date = Date::now();
            $adoption->save();

            //Si la decisión fué aceptada, se actualiza el estado de la mascota correspondiente
            if($request->state == 'Aceptada'){
                $pet = Pet::findOrFail($adoption->pet_id);
                $state = PetState::where('state', 'Adoptado')->first();
                $pet->state = $state->id;
                $pet->save();
            }

            return $adoption;
        } else { 
            // De lo contrario, crea una nueva adopción
            //Obtenemos el id del usuario autenticado
            $user = User::findOrFail($request->user_id);
            $pet = Pet::findOrFail($request->pet_id);

            if(!$user){
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            $AdoptionExist = Adoption::where('pet_id', $pet->id)->where('user_id', $user->id)->first();

            if($AdoptionExist){
                return response()->json(['error' => 'Ya existe una solicitud de adopción para esta mascota'], 404);
            }
            
            return Adoption::create([
                'pet_id' => $pet->id,
                'user_id' => $user->id, 
                'state' => 'En proceso',
                'start_date' => Date::now(),
                'end_date' => Date::now(),
            ]);
        }
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