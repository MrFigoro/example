<?php
/*
|--------------------------------------------------------------------------
| Client's Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', 'SiteController@index');
Route::post('login', 'AuthController@login');
Route::post('/registration', 'AuthController@registration');
Route::get('/profile', 'AuthController@profile')->middleware('auth:api');

Route::post('/parsermoc/store', 'ParserMocController@store')->name('parserMocStore')->middleware('auth:api');
Route::get('/parsermoc/results/{id}', 'ParserMocController@results')->name('parserMocResults')->middleware('auth:api');

Route::post('/parser/store', 'PagesController@store')->name('parserStore')->middleware('auth:api');
Route::get('/parser/results/{id}', 'PagesController@results')->name('parserResults')->middleware('auth:api');
Route::post('/pages', 'PagesController@pageResults')->name('pages')->middleware('auth:api');

Route::get('/pages/delete/{id}', 'PagesController@destroy')->name('pagesDelete')->middleware('auth:api');