<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\courseController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('course', function () {
    return view('course');
})->middleware('auth');


Route::get('/home', [courseController::class, 'index'])->name('home');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('courseInsert', [courseController::class, 'courseInsert'])->name('courseInsert');
Route::post('courseInsertPost', [courseController::class, 'courseInsertPost'])->name('courseInsertPost');

Route::get('courseUpdate/{id}', [courseController::class, 'courseUpdate'])->name('courseUpdate');
Route::post('courseUpdatePost/{id}', [courseController::class, 'courseUpdatePost'])->name('courseUpdatePost');

Route::get('courseDelete/{id}', [courseController::class, 'courseDelete'])->name('courseDelete');

Route::get('mlogout', [courseController::class, 'mlogout'])->name('mlogout');


