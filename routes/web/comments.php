<?php

use Illuminate\Support\Facades\Route;

Route::post('/admin/post/{post}', 'CommentController@store')->name('comment.store');

Route::delete('/admin/post/{post}', 'CommentController@destroy')->name('comment.destroy');