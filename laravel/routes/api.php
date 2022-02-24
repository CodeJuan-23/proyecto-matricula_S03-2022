<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\PadresController;

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

/*ruta para usar en el POSTMAN y la base de datos*/

//Route::get("/v1/padres")


Route::get('/v1/padres',[PadresController::class,'getAll']);

Route::get('/v1/padres/{id}',[PadresController::class,'getItem']);

Route::post("/v1/padres",[PadresController::class,"store"]);

Route::put("/v1/padres",[PadresController::class,"update"]);

Route::patch("/v1/padres",[PadresController::class,"patch"]);

Route::delete("/v1/padres/{id}",[PadresController::class,"delete"]);
