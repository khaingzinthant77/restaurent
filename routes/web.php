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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,"index"])->name('home_index');

Route::post('reservation_create',[HomeController::class,"reservation_create"])->name('reservation_create');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    Route::get('redirects',[HomeController::class,"redirects"]);
})->name('dashboard');
Route::group(['middleware' => 'auth'], function () {
    Route::get('redirects',[HomeController::class,"redirects"]);
    Route::get('/home', [HomeController::class, 'redirects'])->name('redirects');

    Route::resource('reservations','App\Http\Controllers\ReservationController');

    Route::get('dashboard','App\Http\Controllers\HomeController@dashboard');

    Route::get('profile','App\Http\Controllers\UserController@profile')->name('profile');

    Route::get('change_password','App\Http\Controllers\UserController@change_password')->name('change_password');

    Route::post('update_password','App\Http\Controllers\UserController@update_password')->name('update_password');

    Route::get('change-status-active', 'App\Http\Controllers\ReservationController@changestatusactive')->name('change-status-active');
});

Route::get('users',[UserController::class,'users']);


Auth::routes();


