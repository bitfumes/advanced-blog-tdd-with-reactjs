<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('blog', 'BlogController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
