<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\ApiController;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Transformers\StatusTransformer;

class StatusController extends ApiController
{
    public function __construct()
    {
        $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('transform.input:' . StatusTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado=Status::all();

        return $this->showAll($estado);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->allowedAdminAction();
        
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];

        $this->validate($request, $rules);

        $estado = Status::create($request->all());

        return $this->showOne($estado, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $estado)
    {
        return $this->showOne($estado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $estado)
    {
        $estado->fill($request->only([
            'name',
            'description',
        ]));

        if ($estado->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $estado->save();

        return $this->showOne($estado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $estado)
    {
       // $this->allowedAdminAction();
        
        $estado->delete();

        return $this->showOne($estado);
    }
}
