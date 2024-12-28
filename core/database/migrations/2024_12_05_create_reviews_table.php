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
        Schema::create('reviews', function (Blueprint $table) {
            $table->integer('code', 11); // Campo `code` como clave primaria
            $table->string('name');
            $table->string('last_name');
            $table->integer('rating')->unsigned()->checkBetween(1, 5);
            $table->text('opinion');
            $table->string('image_path')->nullable();
            $table->boolean('isVisible')->default(1); // Estado `isVisible` con valor por defecto 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
