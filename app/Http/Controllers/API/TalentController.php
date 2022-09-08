<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreTalentsRequest;
use App\Http\Requests\UpdateTalentsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Talent;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TalentResource;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Talent::all();
        return TalentResource::collection(Talent::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTalentsRequest $request)
    { 
        return (new TalentResource(Talent::create($request->all())))
        ->additional(['msg'=>'se guardo correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Talent $talento)
    {
        return new TalentResource($talento);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTalentsRequest $request, Talent $talento)
    {
        $talento->update($request->validated());
        return (new TalentResource($talento))
        ->additional(['msg'=>'se actualizo correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Talent $talento)
    {
        $talento->delete();
        return (new TalentResource($talento))
        ->additional(['msg'=>'se elimino correctamente'])
        ->response()
        ->setStatusCode(202);
    }
}
