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
    Route::get('login', array('uses' => 'LoginController@showLogin'));
    Route::post('login', array('uses' => 'LoginController@doLogin'));
   /*  Route::get('/user', function () {
        return new UserResource(User::find(1));
    }); */

    /* https://laravel.com/docs/5.8/api-authentication */
