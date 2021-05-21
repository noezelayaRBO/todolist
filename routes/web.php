<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactFormController;

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


Route::get('/', [Controller::class,'welcome']);
Route::get('/create', [Controller::class,'create']);
Route::post('/store', [Controller::class,'store']);
Route::get('/mytask/{user}', [Controller::class,'show']);
Route::get('/edit/{id}', [Controller::class,'edit']);
Route::patch('/update/{id}', [Controller::class,'update']);
Route::delete('/delete/{id}', [Controller::class,'destroy']);

Route::get('/contactus', [ContactFormController::class,'create']);
Route::post('/contact', [ContactFormController::class,'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');