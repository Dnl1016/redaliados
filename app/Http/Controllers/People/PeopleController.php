<?php

namespace App\Http\Controllers\People;


use App\Models\People;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Transformers\PeopleTransformer;


class PeopleController extends  ApiController
{
    public function __construct()
    {
        $this->middleware('transform.input:' . PeopleTransformer::class)->only(['store', 'update']);
    }
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
    public function store(Request $request)
    {
        
        $rules = [
            "name"=> ['required','max:100'],
            "email"=> ['required',  'max:255'],
            "document"=> ['required','unique:people','min:1','max:300'],
            "phone"=> ['required','min:8','max:100'], 
        ];

        $this->validate($request, $rules);

        $persona = People::create($request->all());

        return $this->showOne($persona, 201);
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
    public function update(Request $request, People $persona)
    {
        $persona->fill($request->only([
            'name',
            'email',
            'document',
            'phone',
        ]));

        if ($persona->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $persona->save();

        return $this->showOne($persona);
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

        return $this->showOne($persona);
    }
}
