<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{

    private Boat $boat;

    public function __construct()
    {
        $this->boat = new Boat();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('boats.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('boats.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $boat = $this->boat->getBoat($id);
        if (blank($boat)) {
            return abort(404);
        }
        return view('boats.show')->with('boat', $boat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
