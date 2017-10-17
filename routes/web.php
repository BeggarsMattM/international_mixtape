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
    return view('index');
});

Route::get('connect', 'SpotifyController@connect');

Route::get('chooseplaylist', 'SpotifyController@code');

Route::get('search', 'SpotifyController@search');
Route::post('search', 'SpotifyController@search');

Route::post('tracklist', 'SpotifyController@tracklist');

Route::post('postcard', 'SpotifyController@postcard');
Route::get('postcard/{id}', 'SpotifyController@viewcard');

Route::post('send', 'SpotifyController@send');
