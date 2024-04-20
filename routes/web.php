<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CitasEsteticasController;
use App\Http\Controllers\CitasGeneralesController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TipoEsteticaController;
use App\Http\Controllers\TipoMascotaController;
use Illuminate\Support\Facades\Route;



Route::resource('/tipo_mascota',TipoMascotaController::class);
Route::resource('/personal',PersonalController::class);
Route::resource('/raza',RazaController::class);
Route::resource('/especialidad',EspecialidadController::class);
Route::resource('/tipo_estetica',TipoEsteticaController::class);
Route::resource('/mascotas', MascotaController::class);
Route::get('/mascotas/{id}', [MascotaController::class, 'show'])->name('mascotas.show');

Route::get('/razas/{tipo_mascota_id}', [RazaController::class, 'getRazasByTipoMascota'])->name('razas.by_tipo_mascota');




Route::resource('/citaestetica',CitasEsteticasController::class);
Route::resource('/citageneral',CitasGeneralesController::class);
// Route::post('/mascotas/showForm', [MascotaController::class, 'showForm'])->name('mascota.showForm');
// Route::post('/mascotas/selectRaza', [MascotaController::class, 'selectRaza'])->name('mascotas.selectRaza');










Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users',UserController::class);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/principal_gen', [GeneralController::class, 'iniciogen'])->name('principal_gen');
Route::match(['get', 'post'], '/principal_tec', [TecnicoController::class, 'iniciotec'])->name('principal_tec');



