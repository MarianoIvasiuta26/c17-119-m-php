<?php

use App\Http\Controllers\Adoption\AdoptionController;
use App\Http\Controllers\Adoption\PublicationDetailController;
use App\Http\Controllers\Pet\PetController;
use App\Http\Controllers\Pet\PetStateController;
use App\Http\Controllers\Pet\AnimalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Acá llamamos a la vista Home de Milo
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Acá llamamos a la vista principal del sistema ya con las funciones de la misma. Una vez que se loguea el usuario.
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//me crea las rutas de todos los metodos que tenga el controlador sea post/get/delete/update
Route::resource('/animals', AnimalController::class)->names('animal');
Route::resource('/pets', PetController::class)->names('pets');
Route::resource('/pet_state', PetStateController::class)->names('pet_state');
//Route::post('/pet_state/store', [PetStateController::class, 'store']);
Route::resource('/adoption', AdoptionController::class)->names('adoption');
Route::post('/adoption/{publication_detail_id}', [AdoptionController::class, 'store'])->name('adoption.store');

// Rutas para PublicationDetailController
Route::resource('/publicationDetail', PublicationDetailController::class)->names('publicationDetail');
Route::post('/publicationDetail/{publication_detail_id}', [PublicationDetailController::class, 'store'])->name('publicationDetail.store');


require __DIR__.'/auth.php';
