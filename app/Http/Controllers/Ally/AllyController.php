<?php

namespace App\Http\Controllers\Ally;

use App\Http\Controllers\ApiController;
use App\Models\Ally;
use Illuminate\Http\Request;
use App\Transformers\AllyTransformer;

class AllyController extends ApiController
{   
    public function __construct()
    {
        $this->middleware('transform.input:' . AllyTransformer::class)->only(['store', 'update']);
    }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required',
            'email'=> 'required',
            'document'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'nodeName'=> 'required',
            'region'=> 'required',
            'formatiionCenter'=> 'required',
        ];

        $this->validate($request, $rules);

        $aliado = Ally::create($request->all());

        return $this->showOne($aliado, 201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ally  $ally
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ally $aliado)
    {
        $aliado->fill($request->only([
            'name',
            'email',
            'document',
            'phone',
            'address',
            'nodeName',
            'region',
            'formatiionCenter',
        ]));

        if ($aliado->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $aliado->save();

        return $this->showOne($aliado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ally  $aliado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ally $aliado)
    {
        $aliado->delete();

        return $this->showOne($aliado);
    }
}
