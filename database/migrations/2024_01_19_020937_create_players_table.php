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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->string('Lastname')->nullable();
            $table->decimal('ID_C',5 - 2)->nullable();
            $table->numeric('Cellphone')->nullable();
            $table->select('Sex')->nullable();
            $table->string('Semester')->nullable();
            $table->foreignId('teams_id')->constrained('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
