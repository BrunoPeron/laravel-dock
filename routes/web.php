<?php

use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogsController;



Route::get('/', function () {
    return redirect('dashboard');
})->middleware('auth');

Route::get('/dashboard', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/register', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/reset-password', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/two-factor-challenge', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/verify-email', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/confirm-password', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/forgot-password', function (){
    return redirect('/');
})->middleware('auth');

Route::get('/users/create', [UsersController::class, 'create'])->middleware('auth');
Route::get('/users/post', [UsersController::class, 'create'])->middleware('auth');
Route::post('/users/post', [UsersController::class, 'store'])->middleware('auth');
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->middleware('auth');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->middleware('auth');
Route::get('/users/list', [UsersController::class, 'index'])->middleware('auth');
Route::put('/users/edit/{id}', [UsersController::class, 'update'])->middleware('auth');


Route::get('/logs/list', [LogsController::class, 'index'])->middleware('auth');
Route::get('/logs/list/search', function (){
    $busca['text'] = request('text');
    $busca['type'] = request('type');
    $logController = new LogsController();
    return $logController->consulta($busca);
})->middleware('auth');

Route::get('/encdec', [LogsController::class, 'create'])->middleware('auth');
Route::get('/encdec/post', [LogsController::class, 'create'])->middleware('auth');
Route::post('/encdec/post', [LogsController::class, 'store'])->middleware('auth');

Route::get('/encdecelastic', [LogsController::class, 'createelastic'])->middleware('auth');
Route::get('/encdecelastic/post', [LogsController::class, 'createelastic'])->middleware('auth');
Route::post('/encdecelastic/post', [LogsController::class, 'storeelastic'])->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
