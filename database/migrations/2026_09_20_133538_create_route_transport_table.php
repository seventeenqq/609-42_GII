<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('route_transport', function (Blueprint $table) {
            $table->foreignId('route_id')
                ->constrained('routes')
                ->cascadeOnDelete();

            $table->foreignId('transport_id')
                ->constrained('transports')
                ->cascadeOnDelete();

            $table->primary(['route_id', 'transport_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('route_transport');
    }
};
