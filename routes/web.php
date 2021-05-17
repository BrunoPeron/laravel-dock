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
use App\Http\Controllers\LogsController;

Route::get('/users/create', [UsersController::class, 'create']);
Route::get('/users/post', [UsersController::class, 'create']);
Route::post('/users/post', [UsersController::class, 'store']);
//Route::get('/users/remove/{id}', [UsersController::class, 'destroy']);
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy']);
Route::get('/users/update/{id}', [UsersController::class, 'update']);
Route::get('/users/list', [UsersController::class, 'index']);



Route::get('/encdec', [LogsController::class, 'create']);
Route::get('/encdec/post', [LogsController::class, 'create']);
Route::post('/encdec/post', [LogsController::class, 'store']);
Route::get('/logs/list', [LogsController::class, 'index']);
Route::get('/logs/list/search', function (){
    $busca['text'] = request('text');
    $busca['type'] = request('type');
    $logController = new LogsController();
    return $logController->consulta($busca);
});
//Route::get('/logs/list/', [LogsController::class, 'consulta']);



//Route::resource('logs', 'App\Http\Controllers\LogsController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
