<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\ApiController;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Transformers\ProjectTransformer;

class ProjectController extends ApiController
{
    public function __construct()
    {
        $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('transform.input:' . ProjectTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyecto= Project::all();

        return $this->showAll($proyecto);
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
            'description'=> 'required',
            'starDate'=> 'required',
            'updateDate' => 'required',
            'remissionDate'=> 'required', 
        ];

        $this->validate($request, $rules);

        $proyecto = Project::create($request->all());

        return $this->showOne($proyecto, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $proyecto)
    {
        return $this->showOne($proyecto);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $proyecto)
    {
        $proyecto->fill($request->only([
            'name',
            'description',
            'starDate',
            'updateDate',
            'remissionDate'
        ]));

        if ($proyecto->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $proyecto->save();

        return $this->showOne($proyecto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $proyecto)
    {
        $proyecto->delete();

        return $this->showOne($proyecto);
    }
}
