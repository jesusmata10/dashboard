<?php

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
    return view('auth.login');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Usuario
    Route::resource('/usuario', 'UserController');
    Route::post('/municipioAjaxUser', 'UserController@municipioAjaxUser');
    Route::post('/parroquiaAjaxUser', 'UserController@parroquiaAjaxUser');

    Route::get('/prueba', 'PruebaController@index');

    Route::resource('/upload', 'UploadController');

    // Gas
    Route::resource('/pdvsa', 'pdvsaController');

    // Roles
    Route::resource('/roles', 'RolesController');
    Route::get('/roles/rolesPermission/{id}', 'RolesController@rolesPermission');
    Route::post('/storeRolPermiso', 'RolesController@storeRolPermiso');

    // Permisos
    Route::resource('/permission', 'PermissionController');

    // Parametros
    Route::resource('/parametro/area', 'TcalleController');
    route::resource('/parametro/zona', 'TzonaController');
    Route::resource('/parametro/hogar', 'TviviendaController');
    Route::resource('/parametro/bombona', 'PbombonasController');


    
});
