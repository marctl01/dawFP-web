<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ModulosController;
use App\Http\Controllers\Admin\UfController;

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
        Route::post('/adm_modulos', [ModulosController::class, 'store'])->name('modulo.create');
        Route::delete('/adm_modulos', [ModulosController::class, 'destroy'])->name('modulo.delete');

        Route::get('/adm_uf', [UfController::class, 'index'])->name('adm_uf');
        Route::post('/adm_uf', [UfController::class, 'store'])->name('uf.create');
        Route::delete('/adm_uf', [UfController::class, 'destroy'])->name('uf.delete');



    });
    
    Route::group(['middleware' => 'role:alumno'], function () {
        

    });

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
