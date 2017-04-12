<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('/registration', 'RegistrationController@create')->name('registration');
Route::post('/registration', 'RegistrationController@store');

Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy')->name('logout');

Route::get('/search', 'SearchController@index')->name('search');

Route::get('/user/{username}', 'ProfileController@show')->name('profile.show');
Route::get('/user/{username}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/user/{username}', 'ProfileController@update')->name('profile.update');

Route::get('/{username}/friends', 'FriendController@index')->name('friends.index');
Route::get('/friend/add/{username}', 'FriendController@store')->name('friends.add');
Route::get('/friend/accept/{username}', 'FriendController@update')->name('friends.accept');


