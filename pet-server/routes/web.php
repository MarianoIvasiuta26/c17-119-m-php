<?php

use App\Http\Controllers\Adoption\AdoptionController;
use App\Http\Controllers\Adoption\AdoptionPublicationController;
use App\Http\Controllers\Adoption\PublicationDetailController;
use App\Http\Controllers\User\DomicileController;
use App\Http\Controllers\User\PersonController;
use App\Http\Controllers\User\RefugeController;
use App\Http\Controllers\User\RoleController;
use App\Http\Controllers\User\UserController;
use App\Models\Person;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('adoption', AdoptionController::class)->names('adoption'); //Agrupa todas las rutas del controlador. Reemplaza la creación de rutas Get y Post individuales.
Route::resource('adoption-publication', AdoptionPublicationController::class)->names('adoption-publication');
Route::resource('publication-detail', PublicationDetailController::class)->names('publication-detail');
// rutras creadas por jesus
Route::resource('user', UserController::class)->names('user');
Route::resource('role', RoleController::class)->names('role');
Route::resource('refuge', RefugeController::class)->names('refuge');
Route::resource('person', PersonController::class)->names('person');
Route::resource('domicile', DomicileController::class)->names('domicile');