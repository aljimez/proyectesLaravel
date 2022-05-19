<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

Route::resource('products', ProductController::class);

Route::middleware('auth:sanctum')->group( function () {

Route::get('products/preuInferior/{preu}', 
	[ProductController::class, 'preuInferior']);
Route::get('products/preview/{id}', 
	[ProductController::class, 'preview']);

});




Route::get('/login', function () {
    return "Has de validar-te com a usuari!";
})->name("login");