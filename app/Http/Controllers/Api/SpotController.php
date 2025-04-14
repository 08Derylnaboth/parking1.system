<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SpotIndexRequest;

class SpotController extends Controller
{
    public function index(SpotIndexRequest $request, Garage $garage):SpotResourceCollection
    {
        return new SpotResourceCollection(
            $garage->spots()
            ->filter($request->validated())
            ->with(relations:'size')
            ->get()
        );
    }
}
