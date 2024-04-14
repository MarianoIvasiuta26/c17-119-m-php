<?php

namespace App\Http\Controllers\Pet;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PetController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //Obtenemos las mascotas registrados en el sistema
        $pets = Pet::all();

        //Devolvemos la vista con todos las mascotas obtenidas
        return Inertia::render('Pet/Pet', [  //primer arg es el nombre del componente y el segundo una matriz de datos para pasar al componente
            'pet' => $pets,
        ]);
    }

    //aca debe ir la  vista para crear una nueva mascota (src > views > ...)
    public function create(){
        return Inertia::render('');
    }

    //para guardar la mascota creada
    public function store(Request $request){
        $request->validate([
            'name'  => 'required | string ',
            'age'   => 'required| numeric',
            'color' => 'string',
            'race'  => 'string',
            'size'  => 'string',
            'description' => 'string',
            'image' => 'string'
        ]);

        //obtenemos todos los datos ingresados en los input del form
        $pet = Pet::create($request->all());

        //validamos si la mascota fue creada
        if ($pet) {
            return redirect()->route('pets.index')->with('success', 'Registro creado correctamente');
        } else {
            return redirect()->route('pets.index')->with('error', 'Ocurrió un error al crear el registro');
        }
    }

    public function show(int $id){
    }

    //debemos mostrarle la vista para editar
    public function edit(int $id){

        //Obtenemos el registro a editar
        $pet = Pet::find($id);

        return Inertia::render('');
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

        //validamos si la mascota fue creada y redirigimos
        if ($pet) {
            return redirect()->route('pets.index')->with('success', 'Registro creado correctamente');
        } else {
            return redirect()->route('pets.index')->with('error', 'Ocurrió un error al crear el registro');
        }
    }

    public function destroy(int $id){
        //Usamos EloquentORM para eliminar en la BD y no usamos la sentencia SQL DELETE
        $pet = Pet::destroy($id);

        //Validamos si se eliminó correctamente la mascota
        if($pet){
            return redirect()->route('pets.index')->with('success', 'Registro eliminado correctamente');
        }else{
            return redirect()->route('pets.index')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }
}
