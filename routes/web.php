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


Route::get('/login', [DeskController::class, 'login']);
Route::post('/loginpost' , [DeskController::class, 'loginpost']);
Route::get('/logout' , [DeskController::class , 'logout']);
Route::post('/updatePost' , [DeskController::class , 'updatePost']);
Route::get('/', [DeskController::class, 'index'])->middleware([Authmidlleware::class]);
Route::get("/confirmé" , [DeskController::class , 'confirmé'])->middleware( [Authmidlleware::class]);
Route::get("/refusé" , [DeskController::class , 'refusé'])->middleware( [Authmidlleware::class]);
Route::post('/add' , [DeskController::class , 'add']);
Route::get('/details/{id}' , [DeskController::class , 'details'])->middleware([Authmidlleware::class]);

Route::get('/refuspost/{id}' , [DeskController::class , 'refuspost']);
Route::post('/appointmentspost' , [DeskController::class , 'appointmentspost']);
Route::post('/updateinfoclient', [DeskController::class, 'updateinfoclient'])->name('updateinfoclient');
Route::post('/updateappointments' , [DeskController::class , 'updateappointments'])->name('updateappointments');