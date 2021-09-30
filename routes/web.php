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

    Route::resource('/usuario', 'UserController');

    Route::get('/prueba', 'PruebaController@index');

    //Route::post('/upload', 'PruebaController@upload');

    Route::resource('/upload', 'UploadController');

    //Route::post('/upload', 'HomeController@upload')->name('upload');

    Route::resource('/pdvsa', 'pdvsaController');

    Route::resource('/roles', 'RolesController');
    Route::get('/roles/rolesPermission/{id}', 'RolesController@rolesPermission');
    Route::post('/storeRolPermiso', 'RolesController@storeRolPermiso');

    Route::resource('/permission', 'PermissionController');
    
});
