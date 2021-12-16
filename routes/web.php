<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\EmpleController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\UsuariosController;
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
    return view('home');
});


Route::get('/alumnos', [AlumnosController::class, 'index']);
Route::get('/alumnos/create', [AlumnosController::class, 'create']);
Route::post('/alumnos', [AlumnosController::class, 'store'])
    ->name('alumnos.store');
Route::get('/alumnos/{id}/edit', [AlumnosController::class, 'edit']);
Route::put('/alumnos/{id}', [AlumnosController::class, 'update'])
    ->name('alumnos.update');
Route::delete('/alumnos/{id}', [AlumnosController::class, 'destroy']);

Route::get('/notas', [NotasController::class, 'index']);

Route::get('/login', [UsuariosController::class, 'loginForm']);
Route::post('/login', [UsuariosController::class, 'login']);
Route::post('/logout', [UsuariosController::class, 'logout']);

/*

GET /depart   => index (select global)
GET /depart/create => create (formulario en blanco para INSERT)
POST /depart  => store (graba la información)
GET /depart/{id} => show (select de una fila)
GET /depart/{id}/edit => edit (formalario para modificar una fila)
PUT/PATCH /depart/{id} => update (update de una fila)
DELETE /depart/{id} => destroy (delete de la fila)

*/
