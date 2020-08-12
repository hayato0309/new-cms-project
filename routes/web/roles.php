<?php

use Illuminate\Support\Facades\Route;

Route::get('/roles', 'RoleController@index')->name('roles.index');

Route::post('/roles', 'RoleController@store')->name('roles.store');

Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit');
Route::put('/roles/{role}/update', 'RoleController@update')->name('roles.update');

Route::delete('/roles/{role}/delete', 'RoleController@destroy')->name('roles.destroy');