<?php

use Illuminate\Support\Facades\Route;

Route::get('/post/{id}', 'PostController@show')->name('post.show');

Route::middleware(['auth'])->group(function(){

    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::post('/posts', 'PostController@store')->name('post.store');

    Route::get('/posts/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::patch('/posts/{id}/update', 'PostController@update')->name('post.update');
    Route::delete('/posts/{id}/delete', 'PostController@destroy')->name('post.destroy');
});