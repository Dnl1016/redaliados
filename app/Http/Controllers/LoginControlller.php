<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControlller extends Controller
{
    public function login(Request $request){

        $credentials= $request->only('email', 'password');

        if(!Auth::attempt($credentials)){
            return response([
                "message" => "usuario y/o contraseña es invalido."
            ], 401);
        }
        // $accesstoken = Auth::user()->createToken('authTestToken');
        // $user = $request->user();
        // $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->token;
        
        // return response([
        //     "user"=>Auth::user(),
        //     "access_token"=> $accesstoken
        // ]);
    }   
}
