<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tlbb', 'tlbbController@index');

Route::get('/proxy', 'proxyController@index');

Route::get('/ebbinghaus', 'EbbinghausController@index');