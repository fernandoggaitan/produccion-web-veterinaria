<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServicioCatalogoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios_catalogo', [
    ServicioCatalogoController::class,
    'index'
])->name('servicios_catalogo.index');

Route::resource('/cart', CartController::class)->except(['create', 'store', 'show', 'edit']);
Route::get('/cart/clear', [
    CartController::class,
    'clear'
])->name('cart.clear');

Route::get('/greeting/{locale}', [
    LangController::class,
    'change'
])->name('change_lang');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['is_admin', 'lang'])->group(function (){
    Route::resource('/mascotas', MascotaController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';