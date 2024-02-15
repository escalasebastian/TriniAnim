<?php

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

// Route::resource('noticias', NoticiasController::class);

Route::resource('trinianim', TriniAnimController::class);

Route::get('/', function () {
    return view('welcome');
});
