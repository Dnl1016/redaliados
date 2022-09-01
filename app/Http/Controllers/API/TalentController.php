<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreTalentRequest;
use App\Http\Requests\UpdateTalentRequest;
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
    public function store(Request $request)
    {
        Talent::create($request->all());
        return response()->json([
                'res'=>true,
                'msg'=>'Quedo guardada correctamente'
            ],200);

        // return (new PeopleResource(People::create($request->all())))
        // ->additional(['msg'=>'se guardo correctamente'])
        // ->response()
        // ->setStatusCode(202);
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
