<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// route group for admin and instructor
Route::group(['prefix' => 'admin', 'as' => 'admin.',  'middleware' => ['auth']], function(){
    // route dashbaord
    Route::get('dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    // route tags
    Route::resource('tags', App\Http\Controllers\Admin\TagController::class);
});


