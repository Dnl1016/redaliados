<?php

namespace App\Http\Controllers\Ally;

use App\Http\Controllers\ApiController;
use App\Models\Ally;
use Illuminate\Http\Request;

class AllyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aliado= Ally::all();

        return $this->showAll($aliado);
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
     * @param  \App\Models\Ally  $ally
     * @return \Illuminate\Http\Response
     */
    public function show(Ally $aliado)
    {
        return $this->showOne($aliado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ally  $ally
     * @return \Illuminate\Http\Response
     */
    public function edit(Ally $ally)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ally  $ally
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ally $ally)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ally  $ally
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ally $ally)
    {
        //
    }
}
