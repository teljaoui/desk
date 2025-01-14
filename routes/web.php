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
Route::get('/adminmanager', [DeskController::class , 'adminmanager'])->middleware([Authmidlleware::class]);
Route::post('/updatepassword' ,  [DeskController::class , 'updatepassword']);
Route::get('/updatepasswordreset', [DeskController::class , "updatepasswordreset"])->middleware([Authmidlleware::class]);
Route::get('/deleteadmin/{id}' , [DeskController::class , 'deleteadmin']);
Route::post('/ajouteradmin' , [DeskController::class , 'ajouteradmin']);
Route::get('/addadminreset', [DeskController::class , 'addadminreset']);
Route::post('/addadminPost' , [DeskController::class , 'addadminPost']);



Route::get('/login', [DeskController::class, 'login']);
Route::post('/loginpost' , [DeskController::class, 'loginpost']);
Route::get('/logout' , [DeskController::class , 'logout']);
Route::post('/updatePost' , [DeskController::class , 'updatePost']);
Route::get('/', [DeskController::class, 'index'])->middleware([Authmidlleware::class]);
Route::get("/confirmé" , [DeskController::class , 'confirmé'])->middleware( [Authmidlleware::class]);
Route::get("/refusé" , [DeskController::class , 'refusé'])->middleware( [Authmidlleware::class]);
Route::get('/validé' , [DeskController::class , 'validé'])->middleware([Authmidlleware::class]);
Route::get('/clientvalidé/{id}' , [DeskController::class , 'clientvalidé']);
Route::get('/deleteclient/{id}' , [DeskController::class , 'deleteclient']);
Route::post('/add' , [DeskController::class , 'add']);
Route::get('/details/{id}' , [DeskController::class , 'details'])->middleware([Authmidlleware::class]);
Route::get('/localisations' , [DeskController::class , 'showLocations'])->middleware([Authmidlleware::class]);

Route::get('/refuspost/{id}' , [DeskController::class , 'refuspost']);
Route::post('/appointmentspost' , [DeskController::class , 'appointmentspost']);
Route::post('/updateinfoclient', [DeskController::class, 'updateinfoclient'])->name('updateinfoclient');
Route::post('/updateappointments' , [DeskController::class , 'updateappointments'])->name('updateappointments');
Route::get('/appointments' , [DeskController::class , 'appointments'])->middleware([Authmidlleware::class]);
Route::post('/searchdate' , [DeskController::class , 'searchdate']);