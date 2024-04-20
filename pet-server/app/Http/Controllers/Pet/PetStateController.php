<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Models\PetState;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PetStateController extends Controller{

    public function index(){
        //Obtenemos los estados de las mascotas registrados en el sistema
        $pet_states = PetState::all();

        return $pet_states;
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

        //si no existe, obtenemos todos los datos ingresados en los input del form
        $pet_states = PetState::create($request->all());

        if(!$pet_states){
            $data = [
                'message'  => 'Error al crear el estado',
                'status'    => 500
            ];
        }else{
            $data = [
                'pet_state'    => $pet_states,
                'status'    => 201
            ];

        }
        return response()->json($data, 500);
    }


    public function show(int $id)
    {
        //
    }


    public function edit(int $id){
        //Obtenemos el registro a editar
        $pet_states = PetState::find($id);

        return $pet_states;
    }


    public function update(Request $request, int $id){
        $request->validate([
            'state'  => 'required | string '
        ]);

        $pet_states = PetState::find($id); //buscamos el estado por id a editar
        $pet_states->update( $request->all()); //la actualizamos

        return $pet_states;
    }


    public function destroy(int $id){
        //Usamos EloquentORM para eliminar en la BD y no usamos la sentencia SQL DELETE
        $pet_states = PetState::destroy($id);

        return $pet_states;
    }
}
