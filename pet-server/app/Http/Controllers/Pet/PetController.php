<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class PetController extends Controller{

     //Mostramos obteniendo las mascotas registrados en el sistema
    public function index(){
        $pets = Pet::all();

        //validacion para  ver si hay mascotas
        if($pets->isEmpty()){
            $data = [
                'message'  => "No se encontraron mascotas",
                'status'    => 200
            ];
            return response()->json($data,404);
        }else{
            $data = [
                'pets'       => $pets,
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
       $validator = Validator::make($request->all() ,[
            'user_id' => 'required | integer',
            'pet_state_id'  => 'required | integer',
            'animal_id'    => 'required | integer',
            'name'  => 'required | string ',
            'age'   => 'required | numeric',
            'color' => 'string',
            'race'  => 'string',
            'size'  => 'string',
            'description' => 'string',
            'image' => 'string'
        ]);

        if($validator->fails()){
            $data=[
                'message'  => 'Error en la validacion de datos',
                'error'      => $validator->errors(),
                'status'    => 400
            ];
            return response()->json($data,400);
        }
        //obtenemos todos los datos ingresados en los input del form y creamos la mascota con todos los datos (all())
        $pets = Pet::create($request->all());

        if(!$pets){
            $data = [
                'message'  => 'No se pudo crear la mascota',
                'status'    => 500
            ];
            return response()->json($data,500);
        }else{
            $data = [
                'pet' => $pets,
                'status' => 201
            ];
            return response()->json($data,201);
        }
        return response()->json(['Has guardado el dato', 200]);
    }

    //para mostrar los detalles de una mascota especifica
    public function show(int $id){
        $pets=Pet::find($id);
        if(!$pets){
            $data = [
                'message'  => 'Mascota no encontrada',
                'status'   => 404
            ];
            return response()->json($data, 404);
        } else {
            $data = [
                'pet' => $pets,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }
    }


    //id para buscar el registro, y request para colocarle los datos nuevos (actualiza modificando todos los datos)
    public function update(Request $request, int $id){
        $pets = Pet::find($id); //buscamos la mascota
        if(!$pets){
            $data = [
                'message'  => 'Mascota no encontrada',
                'status'   => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all() ,[
            'user_id' => 'required | integer',
            'pet_state_id'  => 'required | integer',
            'animal_id'    => 'required | integer',
            'name'  => 'required | string ',
            'age'   => 'required | numeric',
            'color' => 'required | string',
            'race'  => 'required |string',
            'size'  => 'required |string',
            'description' => 'required |string',
            'image' => 'required |string'
        ]);
        if($validator->fails()){
            $data=[
                'message'  => 'Error en la validacion de datos',
                'error'      => $validator->errors(),
                'status'    => 400
            ];
            return response()->json($data,400);
        }

        $pets->update( $request->all()); //la actualizamos
        $pets->save();
        $data = [
            'pets' => $pets,
            'message'=> 'La mascota se  ha actualizado correctamente',
            'status' => 200
        ];
        return response()->json($data,200);
    }

    //actualiza ingresando solo el dato que queremos modificar
    public function updatePartial(Request $request, int $id){
        $pets = Pet::find($id);
        if(!$pets) {
            $data = [
                'message' => 'No  existe una mascota con ese id',
                'status' => 404
            ];
            return response( )->json($data,404);
        }else{
            return response()->json($request->all(), 200);
        }

        $validator = Validator::make($request->all() ,[
            'user_id' => 'integer',
            'pet_state_id'  => 'integer',
            'animal_id'    => 'integer',
            'name'  => 'string ',
            'age'   => 'numeric',
            'color' => 'string',
            'race'  => 'string',
            'size'  => 'string',
            'description' => 'string',
            'image' => 'string'
        ]);
        if($validator->fails()){
            $data=[
                'message'  => 'Error en la validacion de datos',
                'error'      => $validator->errors(),
                'status'    => 400
            ];
            return response()->json($data,400);
        }else{
            if($request->has('user_id')){
                $pets->user_id = $request->user_id;
            }
            if($request->has('pet_state_id')){
                $pets->pet_state_id = $request->pet_state_id;
            }
            if($request->has('animal_id')){
                $pets->animal_id = $request->animal_id;
            }
            if($request->has('name')){
                $pets->name = $request->name;
            }
            if($request->has('age')){
                $pets->age = $request->age;
            }
            if($request->has('color')){
                $pets->color = $request->color;
            }
            if($request->has('race')){
                $pets->race = $request->race;
            }
            if($request->has('size')){
                $pets->size = $request->size;
            }
            if($request->has('description')){
                $pets->description = $request->description;
            }
            if($request->has('image')){
                $pets->image = $request->image;
            }
            $pets->save();
            $data = [
                'message' => 'Mascota actualizada correctamente',
                'pets'    => $pets,
                'status' => 200
            ];
            return response()->json($data, 200);
        }
    }

    public function destroy(int $id){
        //Usamos EloquentORM para eliminar en la BD y no usamos la sentencia SQL DELETE
        $pets = Pet::find($id);

        if(!$pets){
            $data = [
                'message'  => 'Mascota no encontrada',
                'status'   => 404
            ];
            return response()->json($data, 404);
        } else {

            $pets->delete(); //realmente quita el dato de la bd

            $data = [
                'message' => 'La Mascota fue borrada correctamente',
                'status'=> 200
            ];
            return response()->json($data, 200);
        }
    }
}
