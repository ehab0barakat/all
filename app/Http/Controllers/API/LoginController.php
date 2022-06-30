<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        if (auth()->attempt($request->only("email","password"))){
            return ["token" => request()->user()->createToken("api")->plainTextToken ] ;

        }
        else{
            return "no" ;
        }
    }
}
