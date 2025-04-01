<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Usuarios
Route::resource('user', UserController::class)->middleware('auth');
Route::get('/perfil', [App\Http\Controllers\UserController::class, 'index'])->name('perfil')->middleware('auth');
Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update')->middleware('auth');
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'listado'])->middleware('auth', 'rol:administrador')->name('listado');

//Rutas cambios contraseña
Route::post('/confirm', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'confirm'])->name('confirm')->middleware('auth');
Route::post('/actualizar', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'actualizar'])->name('password.actualizar')->middleware('auth');
Route::get('/newPass', function(){
    return view('auth/passwords/newPass');
})->name('newPass')->middleware('auth');