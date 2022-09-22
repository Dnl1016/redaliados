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
Use  App\Http\Controllers\User\UserLineController;
use  App\Http\Controllers\Ally\AllyController;
use App\Http\Controllers\SendEmailController;
use App\Models\User;

use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Return_;

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
Route::get('usuarios', [UserController::class, 'index']) ->name('usuarios.index');

Route::get('usuario/{usuario}', [UserController::class, 'show']) ->name('usuario.show');

Route::post('usuario', [UserController::class, 'store'])->name('usuario.store'); 

Route::put('usuario/{usuario}', [UserController::class, 'update'])->name('usuario.update');

Route::delete('usuario/{usuario}', [UserController::class, 'destroy'])->name('usuario.destroy');

Route::resource('usuario.linea', UserLineController::class)->only(['index']);

Route::name('verify')->get('usuario/verify/{token}', 'User\UserController@verify');

Route::name('resend')->get('usuario/{usuario}/resend', 'User\UserController@resend');

//personas

// Route::apiResource('personas', PeopleController::class)
// ->only(['index', 'show']);
Route::get('personas', [PeopleController::class, 'index'])->name('personas.index');

Route::get('persona/{persona}', [PeopleController::class, 'show'])->name('persona.show');

Route::post('persona', [PeopleController::class, 'store'])->name('persona.store');

Route::put('persona/{persona}', [PeopleController::class, 'update'])->name('persona.update');

Route::delete('persona/{persona}', [PeopleController::class, 'destroy'])->name('persona.destroy');

Route::resource('talento.persona', TalentPeopleController::class)->only(['index']);


//tipo documento

// Route::apiResource('tiposDocumentos', TypeDocumentController::class)->only([
//     'index', 'show'
// ]);
Route::get('tiposDocumentos', [TypeDocumentController::class, 'index'])->name('tiposDocumentos.index');

Route::get('tipoDocumento/{tipoDocumento}', [TypeDocumentController::class, 'show'])->name('tipoDocumento.show');

Route::post('tipoDocumento', [TypeDocumentController::class, 'store'])->name('tipoDocumento.store');

Route::put('tipoDocumento/{tipoDocumento}', [TypeDocumentController::class, 'update'])->name('tipoDocumento.update');

Route::delete('tipoDocumento/{tipoDocumento}', [TypeDocumentController::class, 'destroy'])->name('tipoDocumento.destroy');

//talento
Route::get('talentos', [TalentController::class, 'index'])->name('talentos.index');

Route::post('talento', [TalentController::class, 'store'])->name('talento.store');

Route::get('talento/{talento}', [TalentController::class, 'show'])->name('talento.show');

Route::put('talento/{talento}', [TalentController::class, 'update'])->name('talento.update');

Route::delete('talento/{talento}', [TalentController::class, 'destroy'])->name('talento.destroy');


//Compañia
Route::get('compañias', [CompanyController::class, 'index'])->name('compañias.index');

Route::post('compañia', [CompanyController::class, 'store'])->name('compañia.store');

Route::get('compañia/{compañia}', [CompanyController::class, 'show'])->name('compañia.show');

Route::put('compañia/{compañia}', [CompanyController::class, 'update'])->name('compañia.update');

Route::delete('compañia/{compañia}', [CompanyController::class, 'destroy'])->name('compañia.destroy');

//Estado
Route::get('estados', [StatusController::class, 'index'])->name('estados.index');

Route::post('estado', [StatusController::class, 'store'])->name('estado.store');

Route::get('estado/{estado}', [StatusController::class, 'show'])->name('estado.show');

Route::put('estado/{estado}', [StatusController::class, 'update'])->name('estado.update');

Route::delete('estado/{estado}', [StatusController::class, 'destroy'])->name('estado.destroy');

//skill
Route::get('skills', [SkillController::class, 'index'])->name('skills.index');

Route::post('skill', [SkillController::class, 'store'])->name('skill.store');

Route::get('skill/{skill}', [SkillController::class, 'show'])->name('skill.show');

Route::put('skill/{skill}', [SkillController::class, 'update'])->name('skill.update');

Route::delete('skill/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');

//proyecto
Route::get('proyectos', [ProjectController::class, 'index'])->name('proyecto.index');

Route::post('proyecto', [ProjectController::class, 'store'])->name('proyecto.store');

Route::get('proyecto/{proyecto}', [ProjectController::class, 'show'])->name('proyecto.show');

Route::put('proyecto/{proyecto}', [ProjectController::class, 'update'])->name('proyecto.update');

Route::delete('proyecto/{proyecto}', [ProjectController::class, 'destroy'])->name('proyecto.destroy');



//linea
Route::get('lineas', [LineController::class, 'index'])->name('lineas.index');

Route::post('linea', [LineController::class, 'store'])->name('linea.store');

Route::get('linea/{linea}', [LineController::class, 'show'])->name('linea.show');

Route::put('linea/{linea}', [LineController::class, 'update'])->name('linea.update');

Route::delete('linea/{linea}', [LineController::class, 'destroy'])->name('linea.destroy');

//idea
Route::get('ideas', [IdeaController::class, 'index'])->name('ideas.index');

Route::post('idea', [IdeaController::class, 'store'])->name('idea.store');

Route::get('idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::put('idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::delete('idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');

//categoria
Route::get('categorias', [CategoryController::class, 'index'])->name('categorias.index');

Route::post('categoria', [CategoryController::class, 'store'])->name('categoria.store');

Route::get('categoria/{categoria}', [CategoryController::class, 'show'])->name('categoria.show');

Route::put('categoria/{categoria}', [CategoryController::class, 'update'])->name('categoria.update');

Route::delete('categoria/{categoria}', [CategoryController::class, 'destroy'])->name('categoria.destroy');

//aliado
Route::get('aliados', [AllyController::class, 'index'])->name('aliados.index');

Route::post('aliado', [AllyController::class, 'store'])->name('aliado.store');

Route::get('aliado/{aliado}', [AllyController::class, 'show'])->name('aliado.show');

Route::put('aliado/{aliado}', [AllyController::class, 'update'])->name('aliado.update');

Route::delete('aliado/{aliado}', [AllyController::class, 'destroy'])->name('aliado.destroy');

Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');