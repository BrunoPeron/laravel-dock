<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('admin_layout');
});




use App\Http\Controllers\UsersController;

Route::get('/users/create', [UsersController::class, 'create']);
Route::get('/users/post', [UsersController::class, 'create']);
Route::post('/users/post', [UsersController::class, 'store']);
//Route::get('/users/remove/{id}', [UsersController::class, 'destroy']);
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy']);
Route::get('/users/update/{id}', [UsersController::class, 'update']);


Route::get('/users/list', [UsersController::class, 'index']);





Route::resource('logs', 'App\Http\Controllers\LogsController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
