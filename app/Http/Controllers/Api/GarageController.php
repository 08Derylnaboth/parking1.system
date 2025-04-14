<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function index(Request $request):GarageResourceCollection{
        return new GarageResourceCollection(
            Garage::withCount([
                'spots as total_spots',
                'spots as free_spots'=>function(Builder $query){
                    $query->whereDoesntHave(relation:'reservations',function(Builder $query){
                        $query whereRaw(sql:'?BETWEEN start AND end',[now()]);
                    })
                }
            ])->get()
            // Garage::get()
        );
    }
}
