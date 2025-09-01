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
    Schema::create('pets', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Relación con el dueño
        $table->string('especie');
        $table->string('raza');
        $table->string('nombre');
        $table->string('color');
        $table->date('fecha_nacimiento');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
