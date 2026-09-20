<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Transport;
use App\Models\Trip;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('trips.create', [
            'routes' => Route::all(),
            'transports' => Transport::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'transport_id' => 'required|exists:transports,id',
            'departure_at' => 'required|date',
            'arrival_at' => 'required|date|after:departure_at',
        ]);

        Trip::create($validated);

        return redirect('/trips');
    }

    public function edit(string $id)
    {
        $trip = Trip::findOrFail($id);

        return view('trips.edit', [
            'trip' => $trip,
            'routes' => Route::all(),
            'transports' => Transport::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'route_id' => 'required|exists:routes,id',
            'transport_id' => 'required|exists:transports,id',
            'departure_at' => 'required|date',
            'arrival_at' => 'required|date|after:departure_at',
        ]);

        $trip = Trip::findOrFail($id);

        $trip->update($validated);

        return redirect('/trips');
    }

    public function destroy(string $id)
    {
        $trip = Trip::findOrFail($id);

        $trip->delete();

        return redirect('/trips');
    }
}
