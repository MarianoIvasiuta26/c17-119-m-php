<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Models\PetState;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PetStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //Obtenemos los estados de las mascotas registrados en el sistema
        $pet_states = PetState::all();

        return $pet_states;
        /*
        //Devolvemos la vista con todos los estados obtenidos
        return Inertia::render('Pet/PetState', [
            'pet_states' => $pet_states,
        ]);
        */
    }

    //por el momento no vamos a tener vistas para crear estados
    public function create()
    {
        //
    }


    public function store(Request $request){
        $request->validate([
            'state'  => 'required | string'
        ]);

        /*
        // Verificamos si el estado ya existe
        if (PetState::where('pet_state', $request->state)->exists()) {
            return redirect()->route('pet_state.index')->with('error', 'El estado ya existe');
        }
        */

        //si no existe, obtenemos todos los datos ingresados en los input del form
        $pet_states = PetState::create($request->all());

        /*if(!$pet_state){
            $data = [
                'message'  => 'Error al crear el estado',
                'status'    => 500
            ];
            return response()->json($data, 500);
        }else{
            $data = [
                'pet_state'    => $pet_state,
                'status'    => 201
            ];
        }
        */

        return('Se guardo');

        /*
        //validamos si el estado fue creado redireccionando la vista
        if ($pet_state) {
            return redirect()->route('pet_state.index')->with('success','Estado agregado correctamente');
        } else {
            return redirect()->route('pet_state.index')->with('error', 'Ocurrió un error al crear el registro');
        }
        */

        //para testear
        if($request->fails()){
            $data = [
                'message'        => 'Error en la validacion de los datos',
                'errors'         => $request->getValidatorErrors(),
                'status'          => 400
            ];
            return response()->json($data, 400);
        }
    }


    public function show(int $id)
    {
        //
    }


    public function edit(int $id){
        //Obtenemos el registro a editar
        $pet_state = PetState::find($id);

        //debemos mostrarle la vista para editar el estado determinado
        return Inertia::render('');
    }


    public function update(Request $request, int $id){
        $request->validate([
            'state'  => 'required | string '
        ]);

        $pet_state = PetState::find($id);
        $pet_state->update( $request->all()); //la actualizamos

        //validamos si el estado fue actualizado y redirigimos
        if ($pet_state) {
            return redirect()->route('pet_state.index')->with('success', 'Registro creado correctamente');
        } else {
            return redirect()->route('pet_state.index')->with('error', 'Ocurrió un error al crear el registro');
        }
    }


    public function destroy(int $id){
        //Usamos EloquentORM para eliminar en la BD y no usamos la sentencia SQL DELETE
        $pet_state = PetState::destroy($id);

        //Validamos si se eliminó correctamente el estado de la mascota
        if($pet_state){
            return redirect()->route('pet_state.index')->with('success', 'Registro eliminado correctamente');
        }else{
            return redirect()->route('pet_state.index')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }
}
