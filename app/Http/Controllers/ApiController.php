<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    Use ApiResponser;

    public function __construct()
    { 
    	$this->middleware('auth:api');
      
    }
}
