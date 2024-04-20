<?php

namespace App\Http\Controllers\Adoption;

use App\Http\Controllers\Controller;
use App\Models\PublicationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class PublicationDetailController extends Controller
{

    public function index()
    {
        $publication = PublicationDetail::all();

        if ($publication->isEmpty()){ // verificamos si la tabla está vacía y actuamos en consecuencia
            $data = [
                'message' => 'No se encontraron publicaciones',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        // mostramos todas las publicaciones 
        $data = [
            'publications' => $publication,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    //En esta funcion creamos una nueva publicación, verificando que exista tanto el usuario como la mascota en sus
    //correspondientes tablas, además que cada mascota solo puede tener una publicación
    public function store(Request $request)
    {
        //Validamos los datos recibidos mediante $request
        $validator = Validator::make($request->all(), [
            'pet_id' => 'required|integer|unique:publication_details', // El campo debe ser único en la tabla
            'user_id' => 'required|integer',
            'publication_date' => 'required|date',
            'description' => 'required|string|max:255',
            'state' => 'required|in:Nuevo,En proceso,Aprobado,Rechazado',
        ]);

        //verificamos si falla la validacion y mostramos que campos tienen datos incorrectos
        if ($validator->fails()){
            $data = [
                'message' => 'Error en la validación de datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        // buscamos pet_id exista en la tabla pets
        $petExist = DB::table('pets')->where('id', $request->pet_id)->exists();

        // buscamos user_id existe en la tabla user
        $userExist = DB::table('users')->where('id', $request->user_id)->exists();

        // verificamos si existen y en caso contrario devolvemos los mensajes de error en $data
        if (!$petExist || !$userExist){
            if (!$petExist && !$userExist){
                $data = [
                    'message' => 'pet_id:' . $request->pet_id . ' no existe en la tabla pets y user_id:' . $request->user_id . ' no existe en la tabla user',
                    'status' => 500
                ];
            } else if (!$petExist) {
                $data = [
                    'message' => 'pet_id:' . $request->pet_id . ' no existe en la tabla pets',
                    'status' => 500
                ];
            } else {
                $data = [
                    'message' => 'user_id:' . $request->user_id . ' no existe en la tabla user',
                    'status' => 500
                ];
            }
            return response()->json($data, 500);
        }

        //verificamos que la mascota a publicar pertenezca al usuaio actual
        $isPetOfUser = DB::table('pets')->where('id', $request->pet_id)->where('user_id', $request->user_id)->exists();
        if (!$isPetOfUser){
            $data = [
                'message' => 'La mascota no esta registrada a nombre del susario ' . $request->user_id, // Mostramos un mensaje de error
                'startus' => 500
            ];
            return response()->json($data, 500);
        }

        // Una vez haya pasado las validaciones y verificaciones Creamo el registro en la tabla
        $publication = PublicationDetail::create([
            'pet_id' => $request->pet_id,
            'user_id' => $request->user_id,
            'publication_date' => $request->publication_date,
            'description' => $request->description,
            'state' => $request->state
        ]);

        if (!$publication) {
            $data = [
                'message' => 'Error al crear el Publicación',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $publication,
            'status' => 201
        ];

        // devolvemos un json con los datos del registro creado 
        return response()->json($data,201);
    }

    // Esta funcion muestra una publicación en particular buscando mediante su id
    public function show($id)
    {
        $publication = PublicationDetail::find($id);

        if (!$publication){
            $data = [
                'message' => 'Publicación no encontrada', // mensaje que se mostrara si no se encuentra el id
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'publication' => $publication,
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

    // buscamos las publicaciones de un usuario en particular
    public function showUserId ($userId)
    {
        $publications = PublicationDetail::where('user_id', $userId)->get();

        if ($publications->isEmpty()){
            $data = [
                'message' => 'No me encontraron publicaciones para el usuario especificado', // mensaje que se mostrara si no se encuentra publicación
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'publication' => $publications,
            'status' => 200
        ];
    
        return response()->json($data, 200);
    }


     // buscamos las publicaciones de un tipo de mascota segun su pet_id y que sea solo del mismo usuario
    public function showpetId ($userId, $petId)
    {
        $publications = DB::table('pets')->where('user_id', $userId)->where('animal_id')->get();

        if ($publications->isEmpty()){
            $data = [
                 'message' => 'No me encontraron publicaciones para este tipo de mascota', // mensaje que se mostrara si no se encuentra publicación
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'publication' => $publications,
            'status' => 200
        ];
    
        return response()->json($data, 200); //  enviamos las publicaciones encontradas
    }

    // Funcion para eliminar una publicación determinado por su id
    public function destroy($id)
    {
        $publication = PublicationDetail::find($id); // buscamos la publicación

        if (!$publication){
            $data = [
                'message' => 'Publicación no encontrada', // mensaje que enviamos al no encontrar la publicación
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $publication->delete();

        $data = [
            'message' => 'Publicaion eliminada exitosamente',
            'status' => 200
        ];

        return response()->json($data,200);
    }

    public function update(Request $request, $id)
    {
        $publication = PublicationDetail::find($id);

        if (!$publication){
            $data = [
                'message' => 'Publicación no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        //Validamos los datos recibidos mediante $request
        $validator = Validator::make($request->all(), [
            'pet_id' => 'required|integer',
            'user_id' => 'required|integer',
            'publication_date' => 'required|date',
            'description' => 'required|string|max:255',
            'state' => 'required|in:Nuevo,En proceso,Aprobado,Rechazado',
        ]);

        if ($validator->fails()){
            $data = [
                'message' => 'Error en la validación de datos',
                'error' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $publication->description = $request->description;
        $publication->state = $request->state;
        $publication->save();

        $data = [
            'message' => 'Publicación modificada exitosamente',
            'publication' => $publication,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    // sin utilidad pora ahora pero se puede imprementar para actalizar algun campo en particular
    public function updatePartial(Request $request, $id)
    {
        //
    }

}