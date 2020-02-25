<?php

use App\Http\Controllers\FilmController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::get('films', 'FilmController@index');
    Route::post('film','FilmController@store');
    Route::get('film/{idFilm}/edit','FilmController@edit');
    Route::put('film/{idFilm}','FilmController@update');
    Route::delete('film/{idFilm}','FilmController@destroy');
    Route::get('film/{idFilm}/acteur','FilmController@showActor');
