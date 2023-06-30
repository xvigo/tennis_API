<?php

namespace App\Http\Controllers\V1;
use App\Http\Controllers\Controller;

use App\Http\Requests\V1\StoreSurfaceRequest;
use App\Http\Requests\V1\UpdateSurfaceRequest;
use App\Http\Resources\V1\SurfaceCollection;
use App\Http\Resources\V1\SurfaceResource;
use App\Models\Surface;

class SurfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new SurfaceCollection(Surface::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurfaceRequest $request)
    {
        abort(501, "Not implemented");
    }

    /**
     * Display the specified resource.
     */
    public function show(Surface $surface)
    {
        return new SurfaceResource($surface);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurfaceRequest $request, Surface $surface)
    {
        abort(501, "Not implemented");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surface $surface)
    {
        abort(501, "Not implemented");
    }
}
