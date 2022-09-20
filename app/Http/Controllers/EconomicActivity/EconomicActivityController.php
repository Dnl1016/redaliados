<?php

namespace App\Http\Controllers\EconomicActivity;

use App\Http\Controllers\ApiController;
use App\Models\EconomicActivity;
use Illuminate\Http\Request;

class EconomicActivityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity= EconomicActivity::all();

        return $this->showAll($activity);
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

        $activity = EconomicActivity::create($request->all());

        return $this->showOne($activity, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EconomicActivity  $economicActivity
     * @return \Illuminate\Http\Response
     */
    public function show(EconomicActivity $activity)
    {
        return $this->showOne($activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EconomicActivity  $economicActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EconomicActivity $activity)
    {
        $activity->fill($request->only([
            'name',
        ]));

        if ($activity->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $activity->save();

        return $this->showOne($activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EconomicActivity  $economicActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(EconomicActivity $activity)
    {
        $activity->delete();

        return $this->showOne($activity);
    }
}
