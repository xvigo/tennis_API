<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreReservationRequest;
use App\Http\Requests\V1\UpdateReservationRequest;
use App\Http\Resources\V1\ReservationCollection;
use App\Http\Resources\V1\ReservationPriceResource;
use App\Http\Resources\V1\ReservationResource;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Filters\V1\ReservationFilter;
use SebastianBergmann\Diff\Diff;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ReservationFilter();
        $queryItems = $filter->transform($request);
        
        $reservations = Reservation::join('users', 'user_id', '=', 'users.id')
                                    ->select('reservations.*', 'users.phone')
                                    ->where($queryItems);

    
        return  new ReservationCollection($reservations->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $validated = $request->all();
        $existReservation = Reservation::where('end', '>=', $validated['start'])
                                        ->where('start', '<=', $validated['end'])
                                        ->count();
        if ($existReservation > 0) {
            abort(409, "Reservation conflict: Another reservation already exists at the given time.");
        }

        return new ReservationPriceResource(Reservation::create($validated));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $validated = $request->all();
        $existReservation = Reservation::where('end', '>=', $validated['start'])
                                        ->where('start', '<=', $validated['end'])
                                        ->count();
        if ($existReservation > 0) {
            abort(409, "Reservation conflict: Another reservation already exists at the given time.");
        }

        $reservation->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        if (auth()->user()->id != $reservation->user_id) {
            abort(403, 'This action is unauthorized.');
        }

        $reservation->delete();
    }
}
