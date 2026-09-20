<?php

namespace App\Http\Controllers;

use App\Models\Route;

class RouteController extends Controller
{
    public function index()
    {
        return view('routes.index', [
            'routes' => Route::all()
        ]);
    }

    public function show(string $id)
    {
        $route = Route::with(['trips.transport', 'transports'])
            ->findOrFail($id);

        return view('routes.show', [
            'route' => $route
        ]);
    }
}
