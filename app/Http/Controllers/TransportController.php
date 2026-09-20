<?php

namespace App\Http\Controllers;

use App\Models\Transport;

class TransportController extends Controller
{
    public function show(string $id)
    {
        $transport = Transport::with('routes')
            ->findOrFail($id);

        return view('transports.show', [
            'transport' => $transport
        ]);
    }
}
