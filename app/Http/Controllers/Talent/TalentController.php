<?php

namespace App\Http\Controllers\Talent;


use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Talent;
use App\Transformers\TalentTransformer;

class TalentController extends ApiController
{
    public function __construct()
    {   
        $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('auth:api')->except(['show', 'index']);
        $this->middleware('transform.input:' . TalentTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talento=Talent::all();

        return $this->showAll($talento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $rules = [
            "jobTittle" =>'required',
            "businessName"=>'required',
            "indrustyRegistration"=> 'required',
            "typeTalents"=>'required',
            "educationalLevel"=> 'required',
            "productDescription"=> 'required',
        ];

        $this->validate($request, $rules);

        $talento = Talent::create($request->all());

        return $this->showOne($talento, 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Talent $talento)
    {
        
        return $this->showOne($talento);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Talent $talento)
    {
        $talento->fill($request->only([
            'jobTittle',
            'businessName',
            'indrustyRegistration',
            'typeTalent',
            'educationalLevel',
            'productDescription',
            'announcement',
        ]));

        if ($talento->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $talento->save();

        return $this->showOne($talento);
    
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
        return $this->showOne($talento);
    }
}
