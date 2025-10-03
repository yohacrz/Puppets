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
        Schema::table('ganancias', function (Blueprint $table) {
            // Añadimos la columna para relacionarla con la tabla 'pagos'
            $table->unsignedBigInteger('pago_id')->nullable()->after('id');

            // Creamos la llave foránea para asegurar la integridad de los datos
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ganancias', function (Blueprint $table) {
            // Esto permite revertir la migración si es necesario
            $table->dropForeign(['pago_id']);
            $table->dropColumn('pago_id');
        });
    }
};