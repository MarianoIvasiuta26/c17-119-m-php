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

        //Devolvemos la vista con todos los estados obtenidos
        return Inertia::render('Pet/PetState', [
            'pet_states' => $pet_states,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
