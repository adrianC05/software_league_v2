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
        Schema::create('type_sanctions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('suspended_games')->nullable();
            $table->decimal('money_to_pay', 5, 2)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_sanctions');
    }
};
