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
    Route::post('film','FilmController@store')->middleware('auth:api');//exemple pour protéger certaines routes(powerpoint de la prof)
    /* Route::middleware('auth')->group( function(){
        // mettre les routes ici
        pour appliquer le middleware a plusieurs routes
        } */
  /*   Route::get('login/admin', 'LoginsController@redirectTo');//->name('admin')->middleware('admin'); 
    Route::get('login/user', 'LoginsController@redirectTo');//->name('user')->middleware('user');  */ 
    Route::get('login', 'LoginsController@login');
    Route::put('login/{idCritic}','LoginsController@update'); //pas sur de la route
    Route::post('film','LoginsController@addUser');
    Route::post('critic','CriticController@store');
    Route::get('login/{login}/user', 'LoginsController@showUser');
    
    /* Route::post('film','FilmController@store'); //enregistrer un film
    Route::get('film/{idFilm}/edit','FilmController@edit'); //consulter 1 film
    Route::put('film/{idFilm}','FilmController@update'); //modification d'un film
    Route::delete('film/{idFilm}','FilmController@destroy'); //suppression d'un film
    Route::get('film/{idFilm}/acteur','FilmController@showActor'); //consultation de tous les acteurs d'un film
    Route::get('film/find/{rating?}/{minLength?}/{maxLength?}/{word?}','FilmController@find'); */ //consulter plusieurs films selon plusieurs parametres */

    /* https://laravel.com/docs/5.8/api-authentication */
