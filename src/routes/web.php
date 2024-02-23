<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\FaculdadeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PDFController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', MainController::class)->middleware('auth')->name('main');
Route::get('/user_log', [AuthController::class, 'show'])->name('login');
Route::post('login', [AuthController::class, 'login']);


Route::post('logout', [AuthController::class, 'logout']);
//Route::get('/', [AuthController::class, 'show'])->name('login');

Route::get('contrato/gerar_pdf', [PDFController::class, 'generate']);

Route::get('/curso/reg', [CursoController::class, 'register_form'])->name('register_form');
Route::post('/curso/save', [CursoController::class, 'save'])->name('save');
Route::get('/curso/ver', [CursoController::class, 'get_all'])->name('get_all');
Route::get('/curso/get', [CursoController::class, 'get_by_json'])->name('get_by_json');
Route::get('/curso/get_disciplina_by_ano', [CursoController::class, 'get_disciplinas_byano'])->name('get_disciplinas_byano');
Route::get('/curso/get_disciplinas_nao_associadas', [CursoController::class, 'disciplinas_nao_associada'])->name('disciplinas_nao_associada');
Route::get('/curso/get_count_disciplinas_associadas', [CursoController::class, 'get_count_disciplinas_associadas'])->name('get_count_disciplinas_associadas');

Route::get('/categoria/reg', [CategoriaController::class, 'register_form'])->name('register_form');
Route::post('/categoria/save', [CategoriaController::class, 'save'])->name('save');
Route::get('/categoria/vizualisar', [CategoriaController::class, 'get_all'])->name('get_all');

Route::get('/disciplina/reg', [DisciplinaController::class, 'register_form'])->name('register_form');
Route::post('/disciplina/save', [DisciplinaController::class, 'save'])->name('save');
Route::get('/disciplina/vizualisar', [DisciplinaController::class, 'get_all'])->name('get_all');
Route::get('/disciplina/get_discplinas_json', [DisciplinaController::class, 'get_discplinas_json'])->name('get_discplinas_json');
//Route::get('/disciplina/get_by_ano', [DisciplinaController::class, 'get_all'])->name('get_all');
Route::get('/disciplina/associar', [DisciplinaController::class, 'associar_form'])->name('associar_form');
Route::post('/disciplina/associar/save', [DisciplinaController::class, 'associar_ao_curso'])->name('associar_ao_curso');
Route::get('/disciplina/get_disciplinas_only', [DisciplinaController::class, 'get_disciplinas_only'])->name('get_disciplinas_only');

Route::get('/docente/reg', [DocenteController::class, 'register_form'])->name('register_form');
Route::post('/docente/save', [DocenteController::class, 'save'])->name('save');
Route::get('/docente/vizualisar', [DocenteController::class, 'get_all'])->name('get_all');
Route::get('/docente/get', [DocenteController::class, 'get'])->name('get');
Route::get('/docente/alocar', [DocenteController::class, 'alocar_disciplina'])->name('alocar_disciplina');
Route::post('/docente/alocar/add_disciplina', [DocenteController::class, 'add_disciplina'])->name('add_disciplina');
Route::get('/docente/get_disciplinas', [DocenteController::class, 'get_disciplinas'])->name('get_disciplinas');
Route::get('/docente/find', [DocenteController::class, 'find'])->name('find');


Route::get('/faculdade/reg', [FaculdadeController::class, 'register_form'])->name('register_form');
Route::post('/faculdade/save', [FaculdadeController::class, 'save'])->name('save');
Route::get('/faculdade/vizualisar', [FaculdadeController::class, 'get_all'])->name('get_all');

