<?php

namespace App\Http\Controllers\Pets;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtenemos los animales registrados en el sistema
        $animals = Animal::all();

        //Devolvemos la vista con todos los animales obtenidos
        return Inertia::render('Pet/Animal', [
            'animals' => $animals,
        ]);
    }

    //no hace nada ya que no existe vista para crear animales, esos datos ya vendrian cargados en la bd
    public function create(){

    }

    //Guardamos el registro
    public function store(Request $request){

        //Primero validamos los datos ingresados por el usuario
        $request->validate([
            'type_animal' => ['required', 'string']
        ]);

        //Ahora obtenemos los datos ingresados en los inputs del form
        $animal = $request->input('animal'); //El input debe llamarse "animal"

        //Creamos el registro
        //Para eso usamos EloquentORM para registrar en la BD y no usamos la sentencia SQL INSERT INTO
        $reg = Animal::create([
            'type_animal' => $animal
        ]);

        //Validamos si se creó correctamente el registro
        if($reg){
            return redirect()->route('animals.index')->with('success', 'Registro creado correctamente');
        }else{
            return redirect()->route('animals.index')->with('error', 'Ocurrió un error al crear el registro');
        }

    }

    public function show(string $id){

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //Obtenemos el registro a editar
        $animal = Animal::find($id);

        //Validamos si se encontró el registro
        if(!$animal){
            return redirect()->route('animals.index')->with('error', 'Registro no encontrado');
        }

        return view('pets.animals.edit', compact('animal')); //Con el compact podemos usar los datos obtenidos en la BD
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //$animal = Animal::find($id);

        //Primero validamos los datos ingresados por el usuario
        $request->validate([
            'type_animal' => ['required', 'string']
        ]);

        //Ahora obtenemos los datos ingresados en los inputs del form
        $animal = $request->input('animal'); //El input debe llamarse "animal"

        //Actualizamos el registro
        //Para eso usamos EloquentORM para actualizar en la BD y no usamos la sentencia SQL UPDATE
        $reg = Animal::where('id', $id)->update([
            'type_animal' => $animal
        ]);

        /* Comprobar cual funciona mejor
        $animal->animal = $animalInput;
        $animal->save();
        */

        //Validamos si se actualizó correctamente el registro
        if($reg){
            return redirect()->route('animals.index')->with('success', 'Registro actualizado correctamente');
        }else{
            return redirect()->route('animals.index')->with('error', 'Ocurrió un error al actualizar el registro');
        }
    }

    //Eliminamos el registro de un animal
    public function destroy(int $id){
        //Para eso usamos EloquentORM para eliminar en la BD y no usamos la sentencia SQL DELETE
        $reg = Animal::destroy($id);

        //Validamos si se eliminó correctamente el registro
        if($reg){
            return redirect()->route('animals.index')->with('success', 'Registro eliminado correctamente');
        }else{
            return redirect()->route('animals.index')->with('error', 'Ocurrió un error al eliminar el registro');
        }
    }
}
