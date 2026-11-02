<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripPaginationSeeder extends Seeder
{
    public function run(): void
    {
        $pairs = DB::table('route_transport')
            ->get(['route_id', 'transport_id']);

        if ($pairs->isEmpty()) {
            throw new \RuntimeException(
                'Сначала заполните маршруты и транспорт.'
            );
        }

        for ($i = 0; $i < 16; $i++) {
            $pair = $pairs[$i % $pairs->count()];

            Trip::firstOrCreate(
                [
                    'route_id' => $pair->route_id,
                    'transport_id' => $pair->transport_id,
                    'departure_at' => sprintf(
                        '2026-12-%02d 08:00:00',
                        $i + 1
                    ),
                ],
                [
                    'arrival_at' => sprintf(
                        '2026-12-%02d 11:00:00',
                        $i + 1
                    ),
                ]
            );
        }
    }
}
