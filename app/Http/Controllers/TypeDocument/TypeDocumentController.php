<?php

namespace App\Http\Controllers\TypeDocument;


use App\Models\TypeDocument;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Transformers\TypeDocumentTransformer;


class TypeDocumentController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['show', 'index']);
        $this->middleware('client.credentials')->only(['index', 'show']);
        $this->middleware('transform.input:' . TypeDocumentTransformer::class)->only(['store', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoDocumento= TypeDocument::all();
        return $this->showAll($tipoDocumento);
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
        $tipoDocumento = TypeDocument::create($request->all());
        return $this->showOne($tipoDocumento, 201);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDocument $tipoDocumento)
    {
        return $this->showOne($tipoDocumento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDocument $tipoDocumento)
    {
    
        $tipoDocumento->fill($request->only([
            'name',  
        ]));

        if ($tipoDocumento->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor diferente para actualizar', 422);
        }

        $tipoDocumento->save();
        return $this->showOne($tipoDocumento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDocument  $tipoDocumento)
    {
        $tipoDocumento->delete();
        return $this->showOne($tipoDocumento);
    }
}
