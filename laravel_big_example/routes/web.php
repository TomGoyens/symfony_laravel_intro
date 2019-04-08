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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/joke', 'JokeController@index');
Route::get('/pokemon', 'PokemonController@index');
Route::get('/weather', 'WeatherController@index');
Route::get('/recipes', 'RecipePuppyController@index');
