<?php

use App\Http\Controllers\Adoption\AdoptionController;
use App\Http\Controllers\Adoption\PublicationDetailController;
use App\Http\Controllers\Pet\AnimalController;
use App\Http\Controllers\Pet\PetController;
use App\Http\Controllers\Pet\PetStateController;
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
Route::resource('/pet_states', PetStateController::class)->names('pet_states');

// Rutas para AdoptionController
Route::resource('/adoption', AdoptionController::class)->names('adoption');
Route::post('/adoption/{publication_detail_id}', [AdoptionController::class, 'store'])->name('adoption.store');

// Rutas para PublicationDetailController
Route::resource('/publicationDetail', PublicationDetailController::class)->names('publicationDetail');
Route::post('/publicationDetail/{publication_detail_id}', [PublicationDetailController::class, 'store'])->name('publicationDetail.store');
