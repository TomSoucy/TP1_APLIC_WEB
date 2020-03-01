<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Http\Resources\FilmResource;
use App\Http\Requests\filmRequest;

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

    public function index()
    {
        return Films::paginate(20);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(filmRequest $request)
    {

          $film = new Films;
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
    public function showActor($idFilm)
    {

/*         $actors = ActorFilm ::with('actors')->where('film_id', $idFilm)->pluck('first_name', 'last_name')->get();
        return $actors;
        $actors = DB ::table('ActorFilm')->where('film_id', '=', $idFilm)->join('actors', 'ActorFilm.film_id', '=', 'actors.id')->select('actors.first_name', 'actors.last_name')->get();
        return $actors;*/

        $filmActors = ActorFilm::with('actors')->where('film_id', $idFilm)->get();
        $array = [];
        foreach($filmActors as $filmActor){
            $actors = $filmActor->actors;
            foreach($actors as $actor){
                array_push($array, array($actor->first_name => $actor->last_name));
            }
        }
        return $array;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idFilm)
    {
        $film = Films::where('id',$idFilm)->get();
        return $film;
    }

    public function find()
    {

        $query = DB::table('films');
        if(!empty( $_GET['rating'])){
            $query = $query->where('rating', '=', $_GET['rating']);
        }
        if(!empty( $_GET['minLength'])){
            $query = $query->where('length', '>', $_GET['minLength']);
        }
        if(!empty( $_GET['maxLength'])){
            $query = $query->where('length', '<', $_GET['maxLength']);
        }
        if(!empty( $_GET['word'])){
            $word = $_GET['word'];
            $query = $query->where('title', 'like', "%{$word}%")
                            ->orWhere('description', 'like', "%{$word}%");
        }

        $rows = $query->get();

        return $rows;
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
        $film = Films::find($id);
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
