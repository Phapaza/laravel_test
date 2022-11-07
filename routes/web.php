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


Route::get('test', function () {
    return view('test');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/page', [App\Http\Controllers\HomeController::class, 'page'])->name('page');

Route::get('index', function () {
    return view('index');
})->middleware('auth');

Route::post('postProfile',[App\Http\Controllers\ProfileController::class,'postProfile']);
Route::post('getProfile',[App\Http\Controllers\ProfileController::class,'getProfile']);

Route::post('delProfile','ProfileController',@delProfile);
Route::get('edit_{id}',ProfileController,@editProfile);
Route::post('updateProfile',ProfileController,@updateProfile);