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
        Schema::create('country_movie', function (Blueprint $table) {
            $table->foreignId('country_id')->constrained();
            $table->foreignId('movie_id')->constrained();
            $table->unique('country_id');
            $table->unique('movie_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_movie');
    }
};
