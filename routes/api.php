<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\People\PeopleController;
use  App\Http\Controllers\Talent\TalentPeopleController;
use  App\Http\Controllers\TypeDocument\TypeDocumentController;
use  App\Http\Controllers\Talent\TalentController;
use  App\Http\Controllers\Company\CompanyController;
use  App\Http\Controllers\User\UserController;
use  App\Http\Controllers\Skill\SkillController;
use  App\Http\Controllers\Status\StatusController;
use  App\Http\Controllers\Project\ProjectController;
use  App\Http\Controllers\Line\LineController;
use  App\Http\Controllers\Category\CategoryController;
use  App\Http\Controllers\Idea\IdeaController;
use  App\Http\Controllers\Ally\AllyController;
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

Route::resource('talento.persona', TalentPeopleController::class)->only(['index']);


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

//Estado
Route::get('estados', [StatusController::class, 'index']);

Route::post('estado', [StatusController::class, 'store']);

Route::get('estado/{estado}', [StatusController::class, 'show']);

Route::put('estado/{estado}', [StatusController::class, 'update']);

Route::delete('estado/{estado}', [StatusController::class, 'destroy']);

//skill
Route::get('skills', [SkillController::class, 'index']);

Route::post('skill', [SkillController::class, 'store']);

Route::get('skill/{skill}', [SkillController::class, 'show']);

Route::put('skill/{skill}', [SkillController::class, 'update']);

Route::delete('skill/{skill}', [SkillController::class, 'destroy']);

//proyecto
Route::get('proyectos', [ProjectController::class, 'index']);

Route::post('proyecto', [ProjectController::class, 'store']);

Route::get('proyecto/{proyecto}', [ProjectController::class, 'show']);

Route::put('proyecto/{proyecto}', [ProjectController::class, 'update']);

Route::delete('proyecto/{proyecto}', [ProjectController::class, 'destroy']);



//linea
Route::get('lineas', [LineController::class, 'index']);

Route::post('linea', [LineController::class, 'store']);

Route::get('linea/{linea}', [LineController::class, 'show']);

Route::put('linea/{linea}', [LineController::class, 'update']);

Route::delete('linea/{linea}', [LineController::class, 'destroy']);

//idea
Route::get('ideas', [IdeaController::class, 'index']);

Route::post('idea', [IdeaController::class, 'store']);

Route::get('idea/{idea}', [IdeaController::class, 'show']);

Route::put('idea/{idea}', [IdeaController::class, 'update']);

Route::delete('idea/{idea}', [IdeaController::class, 'destroy']);

//categoria
Route::get('categorias', [CategoryController::class, 'index']);

Route::post('categoria', [CategoryController::class, 'store']);

Route::get('categoria/{categoria}', [CategoryController::class, 'show']);

Route::put('categoria/{categoria}', [CategoryController::class, 'update']);

Route::delete('categoria/{categoria}', [CategoryController::class, 'destroy']);

//aliado
Route::get('aliados', [AllyController::class, 'index']);

Route::post('aliado', [AllyController::class, 'store']);

Route::get('aliado/{aliado}', [AllyController::class, 'show']);

Route::put('aliado/{aliado}', [AllyController::class, 'update']);

Route::delete('aliado/{aliado}', [AllyController::class, 'destroy']);
