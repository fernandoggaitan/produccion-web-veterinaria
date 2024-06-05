<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('/mascotas', MascotaController::class);

/*
Route::get('/mascotas', [
    MascotaController::class,
    'index'
])->name('mascotas.index');

Route::get('/mascotas/create', [
    MascotaController::class,
    'create'
])->name('mascotas.create');

Route::post('/mascotas', [
    MascotaController::class,
    'store'
])->name('mascotas.store');

Route::get('/mascotas/{mascota}', [
    MascotaController::class,
    'show'
])->name('mascotas.show');

Route::get('/mascotas/{mascota}/edit', [
    MascotaController::class,
    'edit'
])->name('mascotas.edit');

Route::put('/mascotas/{mascota}', [
    MascotaController::class,
    'update'
])->name('mascotas.update');

Route::delete('/mascotas/{mascota}', [
    MascotaController::class,
    'destroy'
])->name('mascotas.destroy');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
