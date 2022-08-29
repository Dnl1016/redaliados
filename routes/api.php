<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\PeopleController;
use  App\Http\Controllers\Api\TypeDocumentController;


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

Route::get('personas', [PeopleController::class, 'index']);

Route::post('persona', [PeopleController::class, 'store']);

Route::get('persona/{persona}', [PeopleController::class, 'show']);

Route::put('persona/{persona}', [PeopleController::class, 'update']);

Route::delete('persona/{persona}', [PeopleController::class, 'destroy']);

// Route::apiResource('personas', PeopleController::class);


Route::get('TiposDocumentos', [TypeDocumentController::class, 'index']);

Route::post('persona', [TypeDocumentController::class, 'store']);

Route::get('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'show']);

Route::put('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'update']);

Route::delete('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'destroy']);