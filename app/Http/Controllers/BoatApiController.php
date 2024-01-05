<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoatRequest;
use App\Models\Boat;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoatApiController extends Controller
{

    private Boat $boat;

    public function __construct()
    {
        $this->boat = new Boat();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->boat->getBoats());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BoatRequest $request)
    {
        $boat = $this->boat->create($request->validated());

        return response()->json($boat, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $boat = $this->boat->getBoat($id);
        if (blank($boat)) {
            return response()->json([
                'message' => 'Boat not found'
            ], 404);
        }
        return response()->json($boat);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BoatRequest $request, string $id)
    {
        $boat = $this->boat->getBoat($id);
        if (blank($boat)) {
            return response()->json([
                'message' => 'Boat not found'
            ], 404);
        }
        $boat->update($request->validated());

        return response()->json($boat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $boat = $this->boat->getBoat($id);
        if (blank($boat)) {
            return response()->json([
                'message' => 'Boat not found'
            ], 404);
        }
        $boat->delete();

        return response()->json([
            'message' => 'Boat deleted'
        ]);
    }

}
