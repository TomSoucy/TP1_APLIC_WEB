<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Http\Resources\FilmResource;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        //$donnees = $request->all();
        
        // $unFilm = Film::create([ 
        //   'title' => $donnees['title'], 
        //   'description' => $donnees['description'],
        //   'release_year' => $donnees['release_year'],
        //   'language_id' => $donnees['language_id'],
        //   'rental_duration' => $donnees['rental_duration'],
        //   'rental_rate' => $donnees['rental_rate'],
        //   'replacement_cost' => $donnees['replacement_cost']
        //  ]);

        $film = Film::create($request->all());
    
        return $film;

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
