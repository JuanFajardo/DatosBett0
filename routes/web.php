<?php


Route::get('/', 'SistemaController@index')->name('sistema.inicio');
Route::post('/Sistema', 'SistemaController@save')->name('sistema.guardar');

Route::get('/Egp', 'EgpController@index');
Route::get('/Egp/Ver/{id}', 'EgpController@show');
Route::get('/Egp/{id}', 'EgpController@save');

Route::get('/Cies', 'CiesController@index');
Route::get('/Cies/Ver/{id}', 'CiesController@show');
Route::get('/Cies/{id}', 'CiesController@save');
