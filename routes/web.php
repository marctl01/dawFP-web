<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModulosController;
use App\Http\Controllers\Admin\UfController;
use App\Http\Controllers\Admin\EvaluacionesController;
use App\Http\Controllers\Admin\UserController;

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

Route::middleware('auth')->group(function () {
    
    Route::group(['middleware' => 'role:profesor'], function () {
        
        Route::get('/adm_modulos', [ModulosController::class, 'index'])->name('adm_modulos');
        Route::post('/adm_modulos/update', [ModulosController::class, 'update'])->name('modulo.update');
        Route::post('/adm_modulos', [ModulosController::class, 'store'])->name('modulo.create');
        Route::delete('/adm_modulos', [ModulosController::class, 'destroy'])->name('modulo.delete');

        Route::get('/adm_uf', [UfController::class, 'index'])->name('adm_uf');
        Route::post('/adm_uf/update', [UfController::class, 'update'])->name('uf.update');
        Route::post('/adm_uf', [UfController::class, 'store'])->name('uf.create');
        Route::delete('/adm_uf', [UfController::class, 'destroy'])->name('uf.delete');

        Route::get('/adm_evaluaciones', [EvaluacionesController::class, 'index'])->name('adm_evaluaciones');
        Route::post('/adm_evaluaciones/update', [EvaluacionesController::class, 'update'])->name('evaluacion.update');
        Route::post('/adm_evaluaciones', [EvaluacionesController::class, 'store'])->name('evaluacion.create');
        Route::delete('/adm_evaluaciones', [EvaluacionesController::class, 'destroy'])->name('evaluaciones.delete');


        Route::get('/adm_users', [UserController::class, 'index'])->name('adm_users');
        Route::post('/adm_users/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/adm_users', [UserController::class, 'store'])->name('user.create');
        Route::delete('/adm_users', [UserController::class, 'destroy'])->name('user.delete');

    });
    
    Route::group(['middleware' => 'role:alumno'], function () {
        Route::get('/evaluaciones', [EvaluacionesController::class, 'index_alumn'])->name('evaluaciones');
    });

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
