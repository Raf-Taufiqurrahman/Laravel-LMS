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
// route transactions
Route::post('transactions/store', [App\Http\Controllers\TransactionController::class, 'store'])
    ->name('transactions.store')->middleware('auth');
// route comming soon
Route::get('articles', function(){
    return view('landing.onwork');
})->name('articles');

// route auth
Auth::routes();

route::group(['prefix' => 'account', 'as' => 'member.', 'middleware' => ['auth']], function(){
    // route dashboard member
    Route::get('dashboard', App\Http\Controllers\Member\DashboardController::class)->name('dashboard');
    // route series member
    Route::controller(App\Http\Controllers\Member\SeriesController::class)->prefix('series')->group(function(){
        Route::get('/', 'index')->name('series.index');
        Route::get('{series}', 'show')->name('series.show');
        Route::get('{series:slug}/{videos:episode}', 'video')->name('series.video');
    });
    // route transactions member
    Route::controller(App\Http\Controllers\Member\TransactionController::class)->prefix('transactions')->group(function(){
        Route::get('/', 'index')->name('transactions.index');
        Route::get('{transaction:invoice}', 'show')->name('transactions.show');
    });
    // route profile member
    Route::controller(App\Http\Controllers\Member\ProfileController::class)->prefix('profile')->group(function(){
        Route::get('/', 'index')->name('profile.index');
        Route::put('updateProfile/{user}', 'updateProfile')->name('profile.update');
        Route::put('updatePassword/{user}', 'updatePassword')->name('profile.updatePassword');

    });
});

// route group for admin and instructor
Route::group(['prefix' => 'admin', 'as' => 'admin.',  'middleware' => ['auth', 'role:admin|instructor']], function(){
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
    // route users
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->only('index', 'update');
    // route roles
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    // route permissions
    Route::resource('permissions', App\Http\Controllers\Admin\PermissionController::class);
    // route transactions
    Route::resource('transactions', App\Http\Controllers\Admin\TransactionController::class);
});


