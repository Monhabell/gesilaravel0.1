<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductividadController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\ProductivityControllerAdm;
use App\Http\Controllers\ReceptionsController;
use App\Http\Middleware\UserDataMiddleware;
use App\Models\Receptions;

/*
    Route::get      | Consultar
    Route::post     | Guardar
    Route::delete   | Eliminar
    Route::put      | Actualizar
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('register', function () {
    return view("/register");
})->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/register', [RegisterController::class, 'saveRegister'])->name('saveRegister');

Route::get('dig/digitizer/{id}', function () {
    return view("dig/digitizer/{id}");
});

// obtener las bases de la base de datos esta se puede reutilizar tanto para administradores como las demas 
Route::get('/dig/digitizer/{id}', [ProfileController::class, 'showDigitizer']);
Route::get('dig/digitizer/obtener-bases/{entorno_id}', [ProfileController::class, 'obtenerBases']); // obtener bases de la base de datos 
Route::get('dig/digitizer/obtener-Tabla/{id}', [ProductividadController::class, 'TablaProduc']); // tabla productividad consulta
Route::get('dig/digitizer/obtener-Paquete/{id}', [ProductividadController::class, 'paquetes']); // consulta de paquetes

Route::post('dig/digitizer/guardar-informacion', [DataUser::class, 'Seve'])->name('dig/digitizer/guardar-informacion');

Route::middleware('auth')->group(function (){

});

//Rutas para administadores
Route::middleware([UserDataMiddleware::class])->group(function () {
    Route::get('/adm/home', function(){
        return view('/adm/home');
    })->name('adm.home');
    
    Route::get('adm/bases', [BaseController::class, 'show'])->name('adm.bases');
    
    //Recepciones
    Route::resource('adm/receptions', ReceptionsController::class)->except('show');
    Route::controller(ReceptionsController::class)->group(function () {
        Route::post('adm/receptions/{reception}', 'update')->name('receptions.update'); //Editar ficha recepción
        Route::put('adm/receptions/', 'receive')->name('receptions.receive'); //Editar ficha recepción
        Route::get('adm/receptions/{environment}', 'show')->name('adm.receptions');
    });
});

Route::get('adm/productivity', [ProductivityControllerAdm::class, 'productivityAdm'])->name('productivity');

Route::controller(BaseController::class)->group(function () {
    Route::delete('adm/bases/{base}', 'destroy')->name('bases.destroy'); //Eliminar base
    Route::post('adm/bases', 'store')->name('bases.store'); //Guarda base
});