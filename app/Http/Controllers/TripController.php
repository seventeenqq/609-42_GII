<?php

namespace App\Http\Controllers;

use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::with(['route', 'transport'])->get();

        return view('trips.index', [
            'trips' => $trips
        ]);
    }

    public function show(string $id)
    {
        $trip = Trip::with(['route', 'transport'])
            ->findOrFail($id);

        return view('trips.show', [
            'trip' => $trip
        ]);
    }
}
