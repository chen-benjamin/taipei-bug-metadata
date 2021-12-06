<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'MetadataController@index')->name('admin.dashboard');

    Route::get('/metadata', 'MetadataController@index');
    Route::post('/metadata', 'MetadataController@store');
    Route::get('/metadata/create', 'MetadataController@create');
    Route::get('/metadata/{id}/update', 'MetadataController@edit');
    Route::post('/metadata/{id}/update', 'MetadataController@update');
}) ;

Route::get('/{id}', 'MetadataController@show')->where('id', '[0-9]+');
Route::post('/metadata', 'MetadataController@store');
