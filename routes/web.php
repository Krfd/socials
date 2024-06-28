<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Update Profile Route
Route::get('/editprofile', [App\Http\Controllers\HomeController::class, 'editprofile'])->name('editprofile');
Route::post('/updateprofile', [App\Http\Controllers\HomeController::class, 'updateprofile'])->name('updateprofile');

// Posts Route
Route::post('/createpost', [App\Http\Controllers\PostController::class, 'create'])->name('createpost');
Route::get('/deletepost/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('deletepost');

// Comments Route
Route::post('/createcomment', [App\Http\Controllers\CommentController::class, 'create'])->name('createcomment');
// Route::get('/deletecomment/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('deletecomment');