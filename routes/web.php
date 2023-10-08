<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\AuthController;

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
/*
Route::get('/', function () {
    return view('home');
});
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/system', [SystemController::class, 'show']);
    Route::post('/system', [SystemController::class, 'addContent']);

    Route::get('/edit-content/{id}', [SystemController::class, 'showData']);

    Route::post('/borrar', [HomeController::class, 'borrar']);

    Route::post('/borrarActividad', [HomeController::class, 'borrarActividad']);
    Route::post('/borrarRegiones', [HomeController::class, 'borrarRegiones']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/', [HomeController::class, 'show']);

Route::post('/', [HomeController::class, 'buscar']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/lugar-turistico/{lugar}', [LugarController::class, 'show']);

Route::get('/actividades', [HomeController::class, 'showActividades']);

Route::get('/regiones', [HomeController::class, 'showRegiones']);


