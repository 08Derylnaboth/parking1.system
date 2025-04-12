<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request){
        $user=User::create([
            'name'=>$request->get(key:'name'),
            'email'=>$request->get(key:'email'),
            'password'=>Hash::make($request->get(key:'password')),
        ]);
        $token=$user->createToken(name:'auth_token')->plainTextToken;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
    }
    public function token(TokenFormRequest $request){
        if(!Auth::attempt($request->only(keys:'email','password'))){
            return response()->json([
                'message'=>'Invalid log in details'
            ]status:401);
        }
        $user=User::where(column:'email',$request->get(key:'email'))->firstOrFail();

        $token=$user->createToken(name:'auth_token')->plainTextToken;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'Bearer'
        ]);
    }
}
