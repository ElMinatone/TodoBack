<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/todo', [TodoController::class, 'store']);
Route::get('/todo', [TodoController::class, 'index']);
Route::put('/todo/{task}', [TodoController::class, 'edit']);
Route::put('/todo/finalizado/{task}', [TodoController::class, 'complete']);
Route::delete('/todo/{task}', [TodoController::class, 'delete']);


