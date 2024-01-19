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
        Schema::create('league_tables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->integer('matches_played')->nullable();
            $table->integer('won')->nullable();
            $table->integer('drawn')->nullable();
            $table->integer('lost')->nullable();
            $table->integer('goals_for')->nullable();
            $table->integer('goals_against')->nullable();
            $table->integer('goals_difference')->nullable();
            $table->integer('points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('league_tables');
    }
};
