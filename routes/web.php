<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile/{id}', 'UserProfileController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('links', 'LinkController');