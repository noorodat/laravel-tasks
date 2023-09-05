<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\PetController;

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

// Route::get('/pet', function() {
//     return view('pet.index');
// })->name('home');

// Route::get('/pets.create', function() {
//     return view('pets.create');
// })->name('addPage');

// Route::get('/pets.edit', function() {
//     return view('pets.edit');
// })->name('editPage');

Route::resource('pet', PetController::class);


// RESOURCE IS ONLY FOR FORM