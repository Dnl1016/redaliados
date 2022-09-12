<?php

namespace App\Http\Controllers\Company;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CompanyResource;

class CompanyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compañia= Company::all();

        return $this->showAll($compañia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        
        // return response()->json([
        //     'res'=>true,
        //     'msg'=>'La compañia quedo guardada correctamente'
        // ],200);

        return (new CompanyResource(Company::create($request->all())))
        ->additional(['msg'=>'se guardo correctamente'])
        ->response()
        ->setStatusCode(202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $compañia)
    {
        return new CompanyResource($compañia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $compañia)
    {
       
        $compañia->update($request->validated());
        return (new CompanyResource($compañia))
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
    public function destroy( Company  $compañia)
    {
        $compañia->delete();
        return (new CompanyResource($compañia))
        ->additional(['msg'=>'se elimino correctamente'])
        ->response()
        ->setStatusCode(202);
    }
}
