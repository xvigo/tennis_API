<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Http\Requests\V1\StoreCourtRequest;
use App\Http\Requests\V1\UpdateCourtRequest;
use App\Models\Court;

use App\Http\Resources\V1\CourtResource;
use App\Http\Resources\V1\CourtCollection;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CourtCollection(Court::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourtRequest $request)
    {
        abort(501, "Not implemented");
    }

    /**
     * Display the specified resource.
     */
    public function show(Court $court)
    {
        return new CourtResource($court);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourtRequest $request, Court $court)
    {
        abort(501, "Not implemented");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        abort(501, "Not implemented");
    }
}
