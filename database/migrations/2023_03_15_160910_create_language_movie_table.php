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
        Schema::create('language_movie', function (Blueprint $table) {
            $table->foreignId('language_id')->constrained();
            $table->foreignId('movie_id')->constrained();
            $table->unique('language_id');
            $table->unique('movie_id');

            // $table->unique(["language_id", "movie_id"], 'language_id_movie_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_movie');
    }
};
