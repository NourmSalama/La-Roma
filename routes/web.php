<?php

use App\Http\Controllers\BartenderController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReservationController;
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
    return view('home');
});

Route::resource('reservation', ReservationController::class);
Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);
Route::resource('bartender', BartenderController::class);
Route::resource('chef', ChefController::class);
Route::resource('order', OrderController::class);
Route::get('/invoice/{reservation}',[ReservationController::class, 'invoice']);
