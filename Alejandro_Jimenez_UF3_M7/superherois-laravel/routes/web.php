<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth','is_admin']], function() {
// Pas 2. LListat de tots els planetes
Route::get('/planets', [App\Http\Controllers\PlanetController::class, 'index'])->name('planets.index');

// Pas 3. Obtenir dades d'un planeta en concret
Route::get('/planets/show/{id}', [App\Http\Controllers\PlanetController::class, 'show'])->name('planets.show');


Route::get('/planets/create', [App\Http\Controllers\PlanetController::class, 'create'])->name('planets.create');


Route::post('/planets/store', [App\Http\Controllers\PlanetController::class, 'store'])->name('planets.store');

Route::get('/planets/destroy/{id}', [App\Http\Controllers\PlanetController::class, 'destroy'])->name('planets.destroy');

Route::get('/planets/edit/{id}', [App\Http\Controllers\PlanetController::class, 'edit'])->name('planets.edit');

Route::post('/planets/update/{id}', [App\Http\Controllers\PlanetController::class, 'update'])->name('planets.update');
});


//superpowers
Route::get('/superpowers/create/', [App\Http\Controllers\SuperpowerController::class, 'create'])->name('superpower.create');

Route::get('/superpowers', [App\Http\Controllers\SuperpowerController::class, 'index'])->name('superpower.index');

Route::get('/superpowers/show/{id}', [App\Http\Controllers\SuperpowerController::class, 'show'])->name('superpower.show');

Route::get('/superpowers/destroy/{id}', [App\Http\Controllers\SuperpowerController::class, 'destroy'])->name('superpower.destroy');

Route::get('/superpowers/edit/{id}', [App\Http\Controllers\SuperpowerController::class, 'edit'])->name('superpower.edit');

Route::post('/superpowers/store/', [App\Http\Controllers\SuperpowerController::class, 'store'])->name('superpower.store');


// Superheroes

Route::get('/superheroes', [App\Http\Controllers\SuperheroController::class, 'index'])->name('superheroes.index');

Route::get('/superheroes/create', [App\Http\Controllers\SuperheroController::class, 'create'])->name('superheroes.create');

Route::get('/superheroes/show/{superhero}', [App\Http\Controllers\SuperheroController::class, 'show'])->name('superheroes.show');

Route::post('/superheroes/store/', [App\Http\Controllers\SuperheroController::class, 'store'])->name('superheroes.store');

Route::get('/superheroes/destroy/{superhero}', [App\Http\Controllers\SuperheroController::class, 'destroy'])->name('superheroes.destroy');

Route::get('/superheroes/edit/{superhero}', [App\Http\Controllers\SuperheroController::class, 'edit'])->name('superheroes.edit');

Route::post('/superheroes/edit/{superhero}', [App\Http\Controllers\SuperheroController::class, 'update'])->name('superheroes.update');

Route::get('/superheroes/powers/{superhero}', [App\Http\Controllers\SuperheroController::class, 'powers'])->name('superheroes.powers');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
