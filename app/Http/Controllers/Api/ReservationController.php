<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(ReservationCreateRequest $request):ReservationResource{
        $reservation =$request->user()->reservation()->create($request->validated());
        return new ReservationResource($reservation);
    }

    public function update(ReservationUpdateRequest $request, Reservation $reservation):ReservationResource
    {
        $reservation->update($request->validated());
        return new ReservationResource($reservation->fresh());
        //$request->user()->can(abilities:'update',$reservation);
    }

    public function destroy(ReservationDestroyRequest $request, Reservation $reservation):JsonResponse
    {
        return response()->json([],status:204)
        //$request->user()->can(abilities:'delete',$reservation);
    }
}
