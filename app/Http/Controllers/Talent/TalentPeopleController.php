<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\ApiController;
use App\Models\Talent;
use Illuminate\Http\Request;


class TalentPeopleController extends ApiController
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $persona=Talent::findOrFail(1)->people;
        
        return $this->showAll($persona);

        // $person = Talent::find(3)->jobTittle;
        // dd($person);
        // $talento=Talent::all();

        // return $this->showAll($talento);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function show(Talent $talent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function edit(Talent $talent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talent $talent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Talent $talent)
    {
        //
    }
}
