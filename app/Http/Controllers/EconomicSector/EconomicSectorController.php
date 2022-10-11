<?php

namespace App\Http\Controllers\EconomicSector;

use App\Http\Controllers\ApiController;
use App\Models\EconomicSector;
use Illuminate\Http\Request;
use App\Transformers\EconomicSectorTransformer;

class EconomicSectorController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['show', 'index']);
        $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('transform.input:' . EconomicSectorTransformer::class)->only(['store', 'update']);
        $this->middleware('scope:read-general')->only('show', 'index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sector= EconomicSector::all();

        return $this->showAll($sector);
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
        ];

        $this->validate($request, $rules);

        $sector = EconomicSector::create($request->all());

        return $this->showOne($sector, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EconomicSector  $economicSector
     * @return \Illuminate\Http\Response
     */
    public function show(EconomicSector $sector)
    {
        return $this->showOne($sector);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EconomicSector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EconomicSector $sector)
    {
        $sector->fill($request->only([
            'name',
        ]));

        if ($sector->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $sector->save();

        return $this->showOne($sector);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EconomicSector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy(EconomicSector $sector)
    {
        $sector->delete();

        return $this->showOne($sector);
    }
}
