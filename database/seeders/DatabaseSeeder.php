<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Пользователь Laravel
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $now = now();

        /*
        |--------------------------------------------------------------------------
        | Routes
        |--------------------------------------------------------------------------
        */

        $route1 = DB::table('routes')->insertGetId([
            'name' => 'Helsinki - Turku',
            'rate_per_kg' => 1.20,
            'distance_km' => 168.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $route2 = DB::table('routes')->insertGetId([
            'name' => 'Helsinki - Tampere',
            'rate_per_kg' => 1.10,
            'distance_km' => 179.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $route3 = DB::table('routes')->insertGetId([
            'name' => 'Turku - Tampere',
            'rate_per_kg' => 1.35,
            'distance_km' => 165.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Transports
        |--------------------------------------------------------------------------
        */

        $transport1 = DB::table('transports')->insertGetId([
            'name' => 'Volvo FH16',
            'capacity_kg' => 18000.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $transport2 = DB::table('transports')->insertGetId([
            'name' => 'Mercedes Sprinter',
            'capacity_kg' => 3500.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $transport3 = DB::table('transports')->insertGetId([
            'name' => 'Scania R500',
            'capacity_kg' => 16000.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Many-to-many: routes <-> transports
        |--------------------------------------------------------------------------
        */

        DB::table('route_transport')->insert([
            [
                'route_id' => $route1,
                'transport_id' => $transport1,
            ],
            [
                'route_id' => $route1,
                'transport_id' => $transport2,
            ],
            [
                'route_id' => $route2,
                'transport_id' => $transport1,
            ],
            [
                'route_id' => $route2,
                'transport_id' => $transport3,
            ],
            [
                'route_id' => $route3,
                'transport_id' => $transport2,
            ],
            [
                'route_id' => $route3,
                'transport_id' => $transport3,
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Trips
        |--------------------------------------------------------------------------
        */

        $trip1 = DB::table('trips')->insertGetId([
            'route_id' => $route1,
            'transport_id' => $transport1,
            'departure_at' => '2026-09-21 08:00:00',
            'arrival_at' => '2026-09-21 11:00:00',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $trip2 = DB::table('trips')->insertGetId([
            'route_id' => $route1,
            'transport_id' => $transport2,
            'departure_at' => '2026-09-22 09:00:00',
            'arrival_at' => '2026-09-22 12:30:00',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $trip3 = DB::table('trips')->insertGetId([
            'route_id' => $route2,
            'transport_id' => $transport3,
            'departure_at' => '2026-09-23 07:30:00',
            'arrival_at' => '2026-09-23 10:45:00',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $trip4 = DB::table('trips')->insertGetId([
            'route_id' => $route3,
            'transport_id' => $transport2,
            'departure_at' => '2026-09-24 10:00:00',
            'arrival_at' => '2026-09-24 13:20:00',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Cargoes
        |--------------------------------------------------------------------------
        */

        DB::table('cargoes')->insert([
            [
                'trip_id' => $trip1,
                'weight_kg' => 1200.50,
                'sender' => 'Nordic Electronics',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'trip_id' => $trip1,
                'weight_kg' => 850.00,
                'sender' => 'Baltic Trade',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'trip_id' => $trip2,
                'weight_kg' => 450.75,
                'sender' => 'Suomi Market',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'trip_id' => $trip3,
                'weight_kg' => 2100.00,
                'sender' => 'North Logistics',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'trip_id' => $trip4,
                'weight_kg' => 600.25,
                'sender' => 'Turku Parts',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
