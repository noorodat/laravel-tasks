<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/signup-login', function () {
    return view('signup-login');
});


Route::post('/signup-login', [UserController::class, 'process'])->name('signup-login');

Route::view('signup-login', 'signup-login')->name('signup-login');

Route::get('/home', function() {
    return view('home');
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');


