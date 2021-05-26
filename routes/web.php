<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/homeuser', [Controller::class,'welcome'])->middleware('auth');
Route::get('/create/{id}', [Controller::class,'create'])->middleware('auth');
Route::post('/store', [Controller::class,'store']);
Route::get('/mytask/{user}', [Controller::class,'show'])->middleware('auth');
Route::get('/edit/{id}', [Controller::class,'edit'])->middleware('auth');
Route::patch('/update/{id}', [Controller::class,'update']);
Route::delete('/delete/{id}', [Controller::class,'destroy'])->middleware('auth');
Route::post('/storenotes/{id}', [Controller::class,'storenotes']);

Route::get('/contactus', [ContactFormController::class,'create']);
Route::post('/contact', [ContactFormController::class,'store']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
