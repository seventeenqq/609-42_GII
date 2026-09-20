<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trip_id')
                ->constrained('trips')
                ->cascadeOnDelete();

            $table->decimal('weight_kg', 10, 2);
            $table->string('sender', 150);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargoes');
    }
};
