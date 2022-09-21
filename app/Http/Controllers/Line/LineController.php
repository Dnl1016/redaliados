<?php

namespace App\Http\Controllers\Line;

use App\Http\Controllers\ApiController;
use App\Models\Line;
use Illuminate\Http\Request;
use App\Transformers\LineTransformer;

class LineController extends ApiController
{
    public function __construct()
    {
        $this->middleware('transform.input:' . LineTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linea= Line::all();

        return $this->showAll($linea);
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
            'name' => 'required',
            'description' => 'required',
        ];

        $this->validate($request, $rules);

        $linea = Line::create($request->all());

        return $this->showOne($linea, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Line  $linea
     * @return \Illuminate\Http\Response
     */
    public function show(Line $linea)
    {
        return $this->showOne($linea);
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Line  $linea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Line $linea)
    {
        $linea->fill($request->only([
            'name',
            'description',
        ]));

        if ($linea->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $linea->save();

        return $this->showOne($linea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Line  $linea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Line $linea)
    {
        $linea->delete();

        return $this->showOne($linea);
    }
}
