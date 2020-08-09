<?php

use Illuminate\Support\Facades\Route;

Route::get('/roles', 'RoleController@index')->name('roles.index');