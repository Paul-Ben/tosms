<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CertiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('application', ApplicationController::class);


// // JavaScript
// document.getElementById('show-form-btn').addEventListener('click', function() {
//     document.getElementById('my-form').style.display = 'block';
//   });