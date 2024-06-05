<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'galeri']);
Route::get('/index', [PostController::class, 'index']);


Route::post('/user-input', 'UserInputController@store')->name('user-input.store');


Route::get('/galeri',function(){
    return view('posts.galeri');
});


Route::get('/form',function(){
    return view('form');
});

Route::get('/home',function(){
    return view('home');
});

Route::get('/blog',function(){
    return view('posts.blog');
});


// routes/web.php



Route::get('/suggestions', [PostController::class, 'showSuggestionForm'])->name('suggestions.form');
Route::post('/suggestions', [PostController::class, 'storeSuggestion'])->name('suggestions.store');
Route::resource('posts', PostController::class);
// Route::post('/suggestions', [PostController::class, 'storeSuggestion'])->name('suggestions.store');

