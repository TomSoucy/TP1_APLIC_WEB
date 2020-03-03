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
 
    
    Route::get('login', 'LoginsController@login');
    Route::put('login/{idCritic}','LoginController@update'); 
    Route::post('film','LoginsController@addUser');
    Route::post('critic','CriticController@store');
    Route::get('login/showUser', 'LoginsController@showUser');
    
