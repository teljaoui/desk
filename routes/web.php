<?php

use App\Http\Controllers\DeskController;
use App\Http\Middleware\Authmidlleware;
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

Route::view('/ajouter', 'Ajouter')->middleware([Authmidlleware::class]);
Route::view('/updatepassword', 'updatepassword')->middleware([Authmidlleware::class]);
Route::view('/details', 'details')->middleware([Authmidlleware::class]);


Route::get('/login', [DeskController::class, 'login']);
Route::post('/loginpost' , [DeskController::class, 'loginpost']);
Route::get('/logout' , [DeskController::class , 'logout']);
Route::post('/updatePost' , [DeskController::class , 'updatePost']);
Route::get('/', [DeskController::class, 'index'])->middleware([Authmidlleware::class]);