<?php

use App\Models\User;
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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('dashboard');

})->name('dashboard');*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    
    // Usuario
    Route::resource('/usuario', 'UserController')->names('usuario');
    Route::post('/municipioAjaxUser', 'UserController@municipioAjaxUser');
    Route::post('/parroquiaAjaxUser', 'UserController@parroquiaAjaxUser');
    Route::post('/ciudadAjaxUser', 'UserController@ciudadAjaxUser');

    Route::get('/prueba', 'PruebaController@index')->name('prueba');

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

    // Personas

    Route::resource('/personas', 'PersonasController')->names('personas');
    Route::get('/personasPdf', 'PersonasController@pdf');
    Route::post('/personaFamilia', 'PersonasController@storeFamiliar');

    // Carnet de  la Patria

    Route::resource('/carnetPatria', 'CarnetController')->names('carnet');

});
