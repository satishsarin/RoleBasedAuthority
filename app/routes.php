<?php

Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::resource('sessions', 'SessionsController');

Route::resource('articles', 'ArticlesController');


// Route::get('admin', function()
// {
//  return "Admin page";
// })->before('auth');

