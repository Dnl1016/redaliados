<?php

namespace App\Http\Controllers\People;

use App\Http\Requests\StorePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use App\Models\People;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PeopleResource;

class PeopleController extends  ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona= People::all();

        return $this->showAll($persona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeopleRequest $request)
    {
        
        // return response()->json([
        //     'res'=>true,
        //     'msg'=>'La persona quedo guardada correctamente'
        // ],200);

        return (new PeopleResource(People::create($request->all())))
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
    public function show(People $persona)
    {
        //return new PeopleResource($persona);
        return $this->showOne($persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeopleRequest $request, People $persona)
    {
       
        $persona->update($request->validated());
        return (new PeopleResource($persona))
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
    public function destroy( People  $persona)
    {
        $persona->delete();
        return (new PeopleResource($persona))
        ->additional(['msg'=>'se elimino correctamente'])
        ->response()
        ->setStatusCode(202);
    }
}
