<?php

use Illuminate\Support\Facades\Route;

Route::get('/users/{id}/profile', 'UserController@show')->name('user.profile.show');
Route::put('/users/{id}/update', 'UserController@update')->name('user.profile.update');

Route::delete('/users/{user}/delete', 'UserController@destroy')->name('user.destroy');


Route::middleware('role:admin')->group(function(){

    Route::get('/users/', 'UserController@index')->name('users.index');
});