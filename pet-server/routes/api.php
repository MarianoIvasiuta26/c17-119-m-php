<?php

use App\Http\Controllers\Adoption\AdoptionController;
use App\Http\Controllers\Adoption\PublicationDetailController;
use App\Http\Controllers\Pet\AnimalController;
use App\Http\Controllers\Pet\PetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//me crea las rutas de todos los metodos que tenga el controlador sea post/get/delete/update
Route::resource('/animals', AnimalController::class)->names('animal');
Route::resource('/pets', PetController::class)->names('pets');


// Rutas para AdoptionController
Route::resource('/adoption', AdoptionController::class)->names('adoption');
Route::post('/adoption/{publication_detail_id}', [AdoptionController::class, 'store'])->name('adoption.store');

// Rutas para PublicationDetailController
Route::get('/publicationDetail', [PublicationDetailController::class, 'index']); // Muestra todas las publicaciones
Route::get('/publicationDetail/{id}', [PublicationDetailController::class, 'show']); // Busca una publicación en particular
Route::get('/publicationDetail/user/{user_id}', [PublicationDetailController::class, 'showUserId']); // Busca y muestra todas las publicaciones de un determinado usuario
Route::get('/publicationDetail/pet/{pet_id}/user/{user_id}', [PublicationDetailController::class, 'showpetId']); // Busca y muestra todas las publicaciones de un determinado tipo de mascota
Route::post('/publicationDetail', [PublicationDetailController::class, 'store']); // Guarda una nueva publicación siempre y cuando cumpla con algunas condiciones
Route::put('/publicationDetail/{id}', [PublicationDetailController::class, 'update']); // Actualiza los campos 'description' y 'states'
Route::patch('/publicationDetail/{id}', [PublicationDetailController::class, 'updatePartial']); // sin utilidad pora ahora pero se puede imprementar para actalizar algun campo en particular
Route::delete('/publicationDetail/{id}', [PublicationDetailController::class, 'destroy']); // elimina la publicación
