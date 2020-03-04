<?php

namespace App\Http\Controllers;
use App\Http\Resources\CriticResource;
use Illuminate\Http\Request;
use App\Http\Requests\criticRequest;
use App\Critics;

class CriticController extends Controller
{
        public function store(criticRequest $request)
    {
        $critic = new Critics();
        $critic->user_id = request('user_id');
        $critic->film_id = request('film_id');
        $critic->score = request('score');
        $critic->comment = request('comment');
        $critic->save();
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
