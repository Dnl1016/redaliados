<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\PeopleController;
use  App\Http\Controllers\Api\TypeDocumentController;
use  App\Http\Controllers\Api\TalentController;
use  App\Http\Controllers\Api\CompanyController;

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

//usuarios
Route::get('usuarios', [PeopleController::class, 'index']);

Route::post('usuario', [PeopleController::class, 'store']);

Route::get('usuario/{usuario}', [PeopleController::class, 'show']);

Route::put('usuario/{usuario}', [PeopleController::class, 'update']);

Route::delete('usuario/{usuario}', [PeopleController::class, 'destroy']);

//personas
Route::get('personas', [PeopleController::class, 'index']);

Route::post('persona', [PeopleController::class, 'store']);

Route::get('persona/{persona}', [PeopleController::class, 'show']);

Route::put('persona/{persona}', [PeopleController::class, 'update']);

Route::delete('persona/{persona}', [PeopleController::class, 'destroy']);

// Route::apiResource('personas', PeopleController::class);

//tipo documento
Route::get('tiposDocumentos', [TypeDocumentController::class, 'index']);

Route::post('tipoDocumento', [TypeDocumentController::class, 'store']);

Route::get('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'show']);

Route::put('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'update']);

Route::delete('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'destroy']);

//talento
Route::get('talentos', [TalentController::class, 'index']);

Route::post('talento', [TalentController::class, 'store']);

Route::get('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'show']);

Route::put('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'update']);

Route::delete('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'destroy']);


//Compañia
Route::get('compañias', [CompanyController::class, 'index']);

Route::post('TipoDocumento', [TypeDocumentController::class, 'store']);

Route::get('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'show']);

Route::put('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'update']);

Route::delete('TipoDocumento/{TipoDocumento}', [TypeDocumentController::class, 'destroy']);




