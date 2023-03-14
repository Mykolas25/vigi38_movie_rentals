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
        Schema::create('movies', function (Blueprint $table) {
            // `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL
            $table->id();

            // `title` VARCHAR(50) NOT NULL,
            $table->string('title', 50);

            // `description` VARCHAR(255) NOT NULL,
            $table->text('description');

            // `release_date` DATE NOT NULL,
            $table->date('release_date');

            // `runtime` INT NOT NULL,
            $table->integer('runtime');

            // `rating` varchar 5 NOT NULL,
            $table->string('rating',5);

            // `image` VARCHAR(1000) NOT NULL,
            $table->string('image', 1000);
            
            //`created_at` TIMESTAMP NOT NULL,
            //`updated_at` TIMESTAMP NOT NULL,
            $table->timestamps();
            
            // `deleted_at` TIMESTAMP NULL DEFAULT NULL
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
