<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('/registration', 'RegistrationController@create')->name('registration');
Route::post('/registration', 'RegistrationController@store');
