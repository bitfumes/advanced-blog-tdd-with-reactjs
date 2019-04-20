<?php


Route::get('/blog', function () {
    return view('blog.index');
});
Route::post('/blog', 'BlogController@store');
