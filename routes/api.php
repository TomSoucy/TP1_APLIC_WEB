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
    Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin'); //A redefinir le AdminController@index.
    Route::get('/user', 'AdminController@index')->name('user')->middleware('user');  
    Route::get('login','LoginController@showLogin');
    Route::post('login','LoginController@doLogin');
    /* Route::get('films', 'FilmController@index'); //afficher tous les films
    Route::post('film','FilmController@store'); //enregistrer un film
    Route::get('film/{idFilm}/edit','FilmController@edit'); //consulter 1 film
    Route::put('film/{idFilm}','FilmController@update'); //modification d'un film
    Route::delete('film/{idFilm}','FilmController@destroy'); //suppression d'un film
    Route::get('film/{idFilm}/acteur','FilmController@showActor'); //consultation de tous les acteurs d'un film
    Route::get('film/find/{rating?}/{minLength?}/{maxLength?}/{word?}','FilmController@find'); //consulter plusieurs films selon plusieurs parametres */

    /* https://laravel.com/docs/5.8/api-authentication */
