<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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
