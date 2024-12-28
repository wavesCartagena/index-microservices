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
        Schema::create('user_role_routes', function (Blueprint $table) {
            $table->id('code'); // Laravel ya lo marca como clave primaria.
            $table->unsignedBigInteger('user_role'); // Asume que el rol está representado por un ID o código.
            $table->integer('route'); // Ruta asociada con el rol.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_routes');
    }
};
