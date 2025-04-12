<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// the below line was added
use App\Http\Resource\UserResource;

class UsersController extends Controller
{
    public function me(Request $request):UserResource{
        return new UserResource($request->user());
    }
}
