<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('login', 'authentication')->name('login');
    Route::post('login', 'authenticate');

    Route::get('logout', 'logout');
});


Route::resource('users', UserController::class);

Route::controller(DashboardController::class)->group(function ()
{
    Route::get('dashboard', 'index');
});
