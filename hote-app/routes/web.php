<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TunelController;
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
    return view('home');
});

Route::view('es', 'home')->name('es');

Route::get('/tunel', [TunelController::class, 'controllerMethod']);

Route::resource('/reservation', 'App\Http\Controllers\ReservacionController')->name('*','reservation');

Route::resource('/buscador', 'App\Http\Controllers\BuscadorController')->name('*','buscador');

Route::group(['middleware'=> ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('/rooms', 'App\Http\Controllers\RoomController')->name('*','rooms');
    Route::resource('/rooms-price', 'App\Http\Controllers\PrecioHabitacionController')->name('*','rooms-price');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
