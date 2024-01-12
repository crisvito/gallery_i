<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['role:admin'])->group(function () {

  Route::get('/dashboard', [HomeController::class, 'admin'])->name('dashboard');
  Route::resource('gallery', GalleryController::class)
    ->except(['create', 'index']);
});

Route::middleware('role:operator')->get('/operator', [HomeController::class, 'operator'])->name('operator');


Auth::routes();
