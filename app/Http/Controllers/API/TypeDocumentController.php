<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreTypeDocumentRequest;
use App\Http\Resources\CompanyResource;
use App\Models\TypeDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\TypeDocumentResource;

class TypeDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return TypeDocument::all();
        return TypeDocumentResource::collection(TypeDocument::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeDocumentRequest $request)
    {
        Talent::create($request->all());
        return response()->json([
                'res'=>true,
                'msg'=>'Quedo guardada correctamente'
            ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TypeDocument $TipoDocumento)
    {
        return new TypeDocumentResource($TipoDocumento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeDocumentRequest $request, TypeDocument $TipoDocumento)
    {
       
        $TipoDocumento->update($request->validated());
        return (new TypeDocumentResource($TipoDocumento))
        ->additional(['msg'=>'se actualizo correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( TypeDocument  $TipoDocumento)
    {
        $TipoDocumento->delete();
        return (new TypeDocumentResource($TipoDocumento))
        ->additional(['msg'=>'se elimino correctamente'])
        ->response()
        ->setStatusCode(202);
    }
}
