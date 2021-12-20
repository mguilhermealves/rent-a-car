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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('cars', App\Http\Controllers\CarController::class);
Route::resource('rents', App\Http\Controllers\RentController::class);

Route::get('users/data', 'App\Http\Controllers\UserController@list')->name('users.data');
Route::get('cars/data', 'App\Http\Controllers\CarController@list')->name('cars.data');
Route::get('rents/data', 'App\Http\Controllers\RentController@list')->name('rents.data');
Route::post('rents/available-cars', 'App\Http\Controllers\RentController@availableCars')->name('rents.available-cars');
Route::get('reports', 'App\Http\Controllers\ReportController@index')->name('reports');
Route::post('reports', 'App\Http\Controllers\ReportController@getData')->name('reports');
