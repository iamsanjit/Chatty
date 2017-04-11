<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('/registration', 'RegistrationController@create')
	->name('registration')
	->middleware('guest');
Route::post('/registration', 'RegistrationController@store');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy')->name('logout');
