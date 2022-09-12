<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\People\PeopleController;
use  App\Http\Controllers\TypeDocument\TypeDocumentController;
use  App\Http\Controllers\Talent\TalentController;
use  App\Http\Controllers\Company\CompanyController;
use  App\Http\Controllers\User\UserController;
use App\Models\User;

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
// Route::apiResource('usuarios', UserController::class);
Route::get('usuarios', [UserController::class, 'index']);

Route::get('usuario/{usuario}', [UserController::class, 'show']);

Route::post('usuario', [UserController::class, 'store']);

Route::put('usuario/{usuario}', [UserController::class, 'update']);

Route::delete('usuario/{usuario}', [UserController::class, 'destroy']);

//personas

// Route::apiResource('personas', PeopleController::class)
// ->only(['index', 'show']);
Route::get('personas', [PeopleController::class, 'index']);

Route::get('persona/{persona}', [PeopleController::class, 'show']);

Route::post('persona', [PeopleController::class, 'store']);

Route::put('persona/{persona}', [PeopleController::class, 'update']);

Route::delete('persona/{persona}', [PeopleController::class, 'destroy']);


//tipo documento

// Route::apiResource('tiposDocumentos', TypeDocumentController::class)->only([
//     'index', 'show'
// ]);
Route::get('tiposDocumentos', [TypeDocumentController::class, 'index']);

Route::get('tipoDocumento/{tipoDocumento}', [TypeDocumentController::class, 'show']);

Route::post('tipoDocumento', [TypeDocumentController::class, 'store']);

Route::put('tipoDocumento/{tipoDocumento}', [TypeDocumentController::class, 'update']);

Route::delete('tipoDocumento/{tipoDocumento}', [TypeDocumentController::class, 'destroy']);

//talento
Route::get('talentos', [TalentController::class, 'index']);

Route::post('talento', [TalentController::class, 'store']);

Route::get('talento/{talento}', [TalentController::class, 'show']);

Route::put('talento/{talento}', [TalentController::class, 'update']);

Route::delete('talento/{talento}', [TalentController::class, 'destroy']);


//Compañia
Route::get('compañias', [CompanyController::class, 'index']);

Route::post('compañia', [CompanyController::class, 'store']);

Route::get('compañia/{compañia}', [CompanyController::class, 'show']);

Route::put('compañia/{compañia}', [CompanyController::class, 'update']);

Route::delete('compañia/{compañia}', [CompanyController::class, 'destroy']);




