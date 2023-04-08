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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::controller(App\Http\Controllers\RolesController::class)->group(function () {
        Route::get('/roles', 'index');
        Route::get('/roles/create', 'create');
        Route::post('/roles', 'store');
        Route::get('/roles/{id}', 'show');
        Route::get('/roles/{id}/edit', 'edit');
        Route::put('/roles/{id}', 'update');
        Route::delete('/roles/{id}', 'destroy');
        Route::get('/getpermissions', 'getpermissions');
    });

    Route::controller(App\Http\Controllers\PermissionsController::class)->group(function () {
        Route::get('/permisos', 'index');
        Route::get('/permisos/{id}', 'show');
        Route::get('/permisos/{id}/edit', 'edit');
        Route::put('/permisos/{id}', 'update');
    });
    
    Route::controller(App\Http\Controllers\DepartamentoController::class)->group(function () {
        Route::get('/departamentos', 'index');
        Route::get('/departamentos/create', 'create');
        Route::post('/departamentos', 'store');
        Route::get('/departamentos/{id}', 'show');
        Route::get('/departamentos/{id}/edit', 'edit');
        Route::put('/departamentos/{id}', 'update');
        Route::delete('/departamentos/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\UserController::class)->group(function () {
        Route::get('/usuarios', 'index');
        Route::get('/usuarios/create', 'create');
        Route::post('/usuarios', 'store');
        Route::get('/usuarios/{id}', 'show');
        Route::get('/usuarios/{id}/edit', 'edit');
        Route::put('/usuarios/{id}', 'update');
        Route::delete('/usuarios/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\DocumentoController::class)->group(function () {
        Route::get('/documentos', 'index');
        Route::get('/documentos/solicitante', 'solicitante');
        Route::get('/documentos/revisor', 'revisor');
        Route::get('/documentos/create', 'create');
        Route::post('/documentos', 'store');
        Route::get('/documentos/{id}', 'show');
        Route::get('/documentos/{id}/edit', 'edit');
        Route::put('/documentos/{id}', 'update');
        Route::delete('/documentos/{id}', 'destroy');
        Route::get('/documentos/{id}/download', 'downloadPdf');
        Route::get('/documentos/{id}/approve', 'approve');
    });

    Route::controller(App\Http\Controllers\CabeceraController::class)->group(function () {
        Route::get('/cabeceras', 'index');
        Route::get('/cabeceras/create', 'create');
        Route::post('/cabeceras', 'store');
        Route::get('/cabeceras/{id}', 'show');
        Route::get('/cabeceras/{id}/edit', 'edit');
        Route::put('/cabeceras/{id}', 'update');
        Route::delete('/cabeceras/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\NotificationsController::class)->group(function () {
        Route::get('/notificaciones', 'index');
    });
});
