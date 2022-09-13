<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\ApiController;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleTalentController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(People $persona)
    {
        // $persona = Talent::find($persona)->jobTittle;
        // dd($person);
        // $talentos = $people->talents;

        // dd($talentos);

        // return $this->showAll($talentos);
    }

}
