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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
