<?php
Route::get('/','front\indexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
