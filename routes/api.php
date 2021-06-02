<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */


// Tablas Maestras

//Tipo_cambio
Route::resource('tipo_cliente', 'Maestras\Tipo_clienteController', ['except' => ['create', 'edit']]);

//Ciiu
Route::resource('ciiu', 'Maestras\CiiuController', ['except' => ['create', 'edit']]);

//Sexo
Route::resource('sexo', 'Maestras\SexoController', ['except' => ['create', 'edit']]);

//Cargo
Route::resource('cargo', 'Maestras\CargoController', ['except' => ['create', 'edit']]);

//TipoDocumento
Route::resource('tipo_documento', 'Maestras\TipoDocumentoController', ['except' => ['create', 'edit']]);


// Tablas de Acceso

//Persona 
Route::resource('personas', 'Persona\PersonaController', ['except' => ['create', 'edit']]);
Route::resource('personas.cargo', 'Persona\PersonaCargoController', ['only' => ['index']]);

//User 
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::resource('users.persona', 'User\UserPersonaController', ['only' => ['index']]);

//Empresa 
Route::resource('empresas', 'Empresa\EmpresaController', ['except' => ['create', 'edit']]);
//Route::resource('users.persona', 'User\UserPersonaController', ['only' => ['index']]);