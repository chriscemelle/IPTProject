<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
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

Route::get('/register', [AuthController::class, 'registrationform']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginform'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');

Route::get('/items', [ItemController::class, 'index']);
    Route::post('/items', [ItemController::class, 'store']);
    Route::get('/items/create', [ItemController::class, 'create']);
    Route::get('/items/{items}/edit', [ItemController::class, 'edit']);
    Route::put('/items/{item}', [ItemController::class, 'update']);
    Route::delete('/items/{item}', [ItemController::class, 'destroy']);