<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){

    Route::post('/admin/post/{post}', 'CommentController@store')->name('comment.store');

    Route::put('/admin/post/{comment}', 'CommentController@update')->name('comment.update');

    Route::delete('/admin/post/{post}', 'CommentController@destroy')->name('comment.destroy');
});