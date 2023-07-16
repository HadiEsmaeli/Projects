<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/', [ ProjectController::class, 'index' ])->name('trains');

Route::get('/single_train/{id}', [ ProjectController::class, 'single_train' ])->name('single_train');

Route::post('/book_now', [ ProjectController::class, 'booknow' ])->name('book_now');

Route::post('/booking', [ ProjectController::class, 'booking' ])->name('booking');

//search by: { `company` , `from` , `to` }
Route::post('/search', [ProjectController::class, 'search'])->name('search');
Route::get('/search', function(){
    return redirect('/');
});

Route::post('/search_from', [ProjectController::class, 'search_from'])->name('search_from');
Route::get('/search_from', function(){
    return redirect('/');
});

Route::post('/search_to', [ProjectController::class, 'search_to'])->name('search_to');
Route::get('/search_to', function(){
    return redirect('/');
});