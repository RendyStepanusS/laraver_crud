<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/siswa','SiswaController@index');
    Route::post('/siswa/store', 'SiswaController@store');
    Route::get('/siswa/edit/{id}', 'SiswaController@edit');
    Route::put('/siswa/update/{id}','SiswaController@update');
    Route::get('/siswa/hapus/{id}', 'SiswaController@delete');
    Route::get('/siswa/profile/{id}', 'SiswaController@profile');
});

