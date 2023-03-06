<?php

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
    return view('welcome');
});

Auth::routes();

Route::controller(App\Http\Controllers\DepartamentoController::class)->group(function () {
    Route::get('/departamentos', 'index');
    Route::get('/departamentos/create', 'create');
    Route::post('/departamentos', 'store');
    Route::get('/departamentos/{id}', 'show');
    Route::get('/departamentos/{id}/edit', 'edit');
    Route::put('/departamentos/{id}', 'update');
    Route::delete('/departamentos/{id}', 'destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
