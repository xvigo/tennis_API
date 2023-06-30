<?php

use App\Models\User;
use App\Models\Court;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->dateTime('start');
            $table->dateTime('end');
            $table->enum('game_type', ['singles', 'doubles']);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Court::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
