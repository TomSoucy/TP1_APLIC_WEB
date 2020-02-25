<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Http\Resources\FilmResource;
use App\Http\Requests\filmRequest;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Film::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(filmRequest $request)
    {
          $film = $request->validated();
          $film = new \App\filmModels;
          $film->title = request('title');
          $film->description = request('description');
          $film->release_year = request('release_year');
          $film->language_id = request('language_id');
          $film->length = request('length');
          $film->rating = request('rating');
          $film->special_features = request('special_features');
          $film->image = request('image');
          $film->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showActor($id)
    {
        $idActeur = DB::table('film_actor')->where('film_id',$id)->value('actor_id');
        $acteur = DB::table('actors')->where('id',$idActeur)->value('firt_name', 'last_name');

        return $acteur;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idFilm)
    {
        $film = \App\filmModels::where('id',$idFilm)->get();
        return $film;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(filmRequest $request, $id)
    {
        $film = \App\filmModels::find($id);
        $film->title = Input::get('title');
        $film->description = Input::get('description');
        $film->release_year = Input::get('release_year');
        $film->language_id = Input::get('language_id');
        $film->length = Input::get('length');
        $film->rating = Input::get('rating');
        $film->special_features = Input::get('special_features');
        $film->image = Input::get('image');
        $film->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('films')->where('id', '=', $id)->delete();
    }
}
