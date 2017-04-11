<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('/registration', 'RegistrationController@create')->name('registration');
Route::post('/registration', 'RegistrationController@store');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy')->name('logout');

Route::get('/search', 'SearchController@index')->name('search');
