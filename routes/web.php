<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DailyController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WeeklyController;

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

Route::get('/homeuser', [TaskController::class,'welcome'])->middleware('auth');
Route::get('/create/{id}', [TaskController::class,'create'])->middleware('auth');
Route::post('/store', [TaskController::class,'store']);
Route::post('/storedaily', [TaskController::class,'storedaily']);
Route::get('/mytask/{user}', [TaskController::class,'show'])->middleware('auth');
Route::get('/edit/{id}', [TaskController::class,'edit'])->middleware('auth');
Route::patch('/update/{id}', [TaskController::class,'update']);
Route::delete('/delete/{id}', [TaskController::class,'destroy'])->middleware('auth');
Route::patch('/complete/{id}',[TaskController::class, 'complete']);

Route::get('/daily/{id}', [DailyController::class,'daily'])->middleware('auth');
Route::post('/storedaily/{id}', [DailyController::class,'store']);
Route::delete('/deletedaily/{id}', [DailyController::class,'destroy']);
Route::get('/editdaily/{id}', [DailyController::class,'edit'])->middleware('auth');
Route::patch('/updatedaily/{id}', [DailyController::class,'update']);

Route::post('/storenotes/{id}', [NoteController::class,'storenotes']);
Route::patch('/updatenote/{id}', [NoteController::class,'updatenote']);
Route::delete('/deletenote/{id}', [NoteController::class,'destroynote']);

Route::get('/contactus', [ContactFormController::class,'view']);
Route::post('/contact', [ContactFormController::class,'store']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/weekly/{weekly}/index', [WeeklyController::class,'showweekly']);
Route::resource('weekly', 'App\Http\Controllers\WeeklyController');
