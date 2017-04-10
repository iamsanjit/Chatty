<?php


Route::get('/', 'HomeController@index')->name('home');

Route::get('alert', function() {
	return redirect()->route('home')->with('info', 'You are signed in.');
});
