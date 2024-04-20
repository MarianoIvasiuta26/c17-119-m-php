<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Inertia\Inertia;

class PetController extends Controller{

     //Mostramos obteniendo las mascotas registrados en el sistema
    public function index(){
        $pet = Pet::all();

        //validacion para  ver si hay mascotas
        if($pet->isEmpty()){
            $data = [
                'message'  => "No se encontraron mascotas",
                'status'    => 200
            ];
            return response()->json($data,404);
        }else{
            $data = [
                'pets'       => $pet,
                'status'       => 200
            ];
            return response()->json($data,200);
        }
    }

    //aca debe ir la  vista para crear una nueva mascota (src > views > ...)
    public function create(){

    }

    //para guardar la mascota creada y validar los datos que vienen del front
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required | integer',
            'pet_state_id'  => 'required | integer',
            'animal_id'    => 'required | integer',
            'name'  => 'required | string ',
            'age'   => 'required| numeric',
            'color' => 'string',
            'race'  => 'string',
            'size'  => 'string',
            'description' => 'string',
            'image' => 'string'
        ]);

        if($request->fails()){
            $data=[
                'message'  => 'Error en la validacion de datos',
                'error'     => $request->getValidatorErrors(),
                'status'    => 400
            ];
            return response()->json($data,400);
        }
        //obtenemos todos los datos ingresados en los input del form y creamos la mascota con todos los datos (all())
        $pet = Pet::create($request->all());

        if(!$pet){
            $data = [
                'message'  => 'No se pudo crear la mascota',
                'status'    => 500
            ];
            return response()->json($data,500);
        }else{
            $data = [
                'pet' => $pet,
                'status' => 201
            ];
            return response()->json($data,201);
        }
    }

    //para mostrar los detalles de una mascota especifica
    public function show(int $id){

    }

    //debemos mostrarle la vista para editar
    public function edit(int $id){
        //Obtenemos el registro a editar
        $pet = Pet::find($id);

    }


    public function update(Request $request, int $id){
        $request->validate([
            'name'  => 'required | string ',
            'age'   => 'required| numeric',
            'color' => 'string',
            'race'  => 'string',
            'size'  => 'string',
            'description' => 'string',
            'image' => 'string'
        ]);

        $pet = Pet::find($id); //buscamos la mascota
        $pet->update( $request->all()); //la actualizamos

    }

    public function destroy(int $id){
        //Usamos EloquentORM para eliminar en la BD y no usamos la sentencia SQL DELETE
        $pet = Pet::destroy($id);

    }
}
