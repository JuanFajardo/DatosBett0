<?php


Route::get('/', 'SistemaController@index')->name('sistema.inicio');
Route::post('/Sistema', 'SistemaController@save')->name('sistema.guardar');

Route::get('/Egp', 'EgpController@index');
Route::get('/Egp/Ver/{id}', 'EgpController@show');
Route::get('/Egp/{id}', 'EgpController@save');
