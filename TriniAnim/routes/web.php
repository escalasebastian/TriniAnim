<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TriniAnimController;
use Illuminate\Support\Facades\Route;

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

Route::resource('trini', TriniAnimController::class);

Route::get('/resumen', [TriniAnimController::class, 'getMedia']);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [
    TriniAnimController::class, 'index'
])->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::get('/dashboard2', function () {
    return view('pruebaIndex');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('prueba', [TriniAnimController::class, 'prueba']);

require __DIR__.'/auth.php';
