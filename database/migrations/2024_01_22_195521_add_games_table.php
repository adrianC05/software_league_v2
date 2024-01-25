<?php

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
        // Columna para guardar los goles del equipo 1 y 2
        Schema::table('games', function (Blueprint $table) {
            $table->integer('team1_goals')->nullable();
            $table->integer('team2_goals')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
