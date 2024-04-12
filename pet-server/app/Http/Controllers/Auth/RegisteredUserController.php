<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Domicile;
use App\Models\Person;
use App\Models\Refuge;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        //Obtenemos los roles de la BD
        $roles = Role::where('role_name', '!=', 'Administrador')
                    ->where('role_name', '!=', 'Visitante')
                    ->get();

        //Devolvemos la vista con los roles obtenidos
        return Inertia::render('Auth/Register', [
            'roles' => $roles,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //Validamos los datos para la tabla User
        $request->validate([
            'role_name' => 'required|string|max:80',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //Validamos los datos para la tabla People y Refuge
        $request->validate([
            'name' => 'required|string|max:80',
            'phone' => 'required|string|max:15',
        ]);

        //Validamos los datos de Domicile
        $request->validate([
            'country' => 'required|string|max:80',
            'province' => 'required|string|max:80',
            'city' => 'required|string|max:80',
            'postal_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        //Buscamos en la BD el rol seleccionado por el usuario a registrarse
        $roleSelect = Role::where('role', $request->role)->first();

        //Creamos el registro del nuevo usuario
        $user = User::create([
            //'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleSelect->id,
        ]);

        if(!$user){
            return redirect()->back()->with('error', 'Error al crear el usuario');
        }

        //Registramos el domicilio del usuario
        $domicile = Domicile::create([
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ]);

        if(!$domicile){
            return redirect()->back()->with('error', 'Error al crear el domicilio');
        }

        //Creamos el registro de la persona
        $person = Person::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'domicile_id' => $domicile->id,
        ]);

        if(!$person){
            return redirect()->back()->with('error', 'Error al crear la persona');
        }

        //Creamos el registro del refugio
        $refuge = Refuge::create([
            'name_refuge' => $request->name,
            'phone' => $request->phone,
            'user_id' => $user->id,
            'domicile_id' => $domicile->id,
        ]);

        if(!$refuge){
            return redirect()->back()->with('error', 'Error al crear el refugio');
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

