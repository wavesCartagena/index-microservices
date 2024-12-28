<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('api_messages', function (Blueprint $table) {
            $table->id('code'); // Código del mensaje
            $table->string('message');         // Texto del mensaje
            $table->integer('http_status');    // Estado HTTP asociado
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_messages');
    }
};
