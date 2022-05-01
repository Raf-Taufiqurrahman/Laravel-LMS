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
// route landing
Route::get('/', App\Http\Controllers\LandingController::class)->name('landing');
// route series
Route::controller(App\Http\Controllers\SeriesController::class)->prefix('series')->group(function(){
    Route::get('/', 'index')->name('series.index');
    Route::get('{series:slug}', 'show')->name('series.show');
    Route::get('{series:slug}/{videos:episode}', 'video')->name('series.video')->middleware('auth');
});
// route carts
Route::controller(App\Http\Controllers\CartController::class)->prefix('carts')->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('carts.index');
    Route::post('/{series:slug}', 'store')->name('carts.store');
    Route::delete('destroy/{cart:id}', 'destroy')->name('carts.destroy');
});

Route::post('transactions/store', [App\Http\Controllers\TransactionsController::class, 'store'])
    ->name('transactions.store')->middleware('auth');

// Route::controller(App\Http\Controllers\TransactionController::class)->prefix('transactions')->middleware()->group(function(){
//     Route::post('/store', 'store')->name('transactions.store');
// });

// route auth
Auth::routes();

// route group for admin and instructor
Route::group(['prefix' => 'admin', 'as' => 'admin.',  'middleware' => ['auth']], function(){
    // route dashbaord
    Route::get('dashboard', App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    // route tags
    Route::resource('tags', App\Http\Controllers\Admin\TagController::class)->except(['show','create','edit']);
    // route series
    Route::resource('series', App\Http\Controllers\Admin\SeriesController::class);
    // route videos
    Route::controller(App\Http\Controllers\Admin\VideoController::class)->prefix('videos')->group(function(){
        // add videos by slug series
        Route::get('add/{series:slug}', 'create')->name('videos.create');
        Route::post('add/{series:slug}', 'store')->name('videos.store');
        // delete videos
        Route::delete('delete/{video:id}', 'destroy')->name('videos.destroy');
        // edit videos
        Route::get('edit/{series:slug}/{video:video_code}', 'edit')->name('videos.edit');
        Route::put('{series:slug}/{video:video_code}', 'upda')->name('videos.update');
    });
});


