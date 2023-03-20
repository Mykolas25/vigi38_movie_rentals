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
        Schema::create('genre_movie', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained();
            $table->foreignId('movie_id')->constrained();
            $table->unique('genre_id');
            $table->unique('movie_id');
            // $table->unique(["genre_id", "movie_id"], 'genre_id_movie_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_movie');
    }
};
