<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use App\Models\Dish;
use App\Models\Table;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
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

Route::controller(AuthenticationController::class)->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', 'authentication')->name('login');
        Route::post('login', 'authenticate');
    });
    Route::get('logout', 'logout')->middleware('auth');
});


Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
    Route::resource('orders', OrderController::class);
    Route::resource('dishes', DishController::class);
    Route::resource('workers', WorkerController::class);
    Route::resource('resources', ResourceController::class);
    
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index');
    });
});