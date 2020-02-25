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
    Route::post('api/film','FilmController@store');
    Route::get('api/film/{idFilm}/edit','FilmController@edit');
    Route::put('api/film/{idFilm}','FilmController@update');
    Route::delete('api/film/{idFilm}','FilmController@destroy');
    Route::get('api/film/{idFilm}/acteur','FilmController@showActor');
