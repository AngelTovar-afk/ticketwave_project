<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tipos_entrada', function (Blueprint $table) {
            // contador de boletos vendidos — se incrementa dentro de la transacción
            // de compra para mantener consistencia con items_pedido
            $table->unsignedInteger('vendidas')->default(0)->after('disponibles');
        });
    }

    public function down(): void
    {
        Schema::table('tipos_entrada', function (Blueprint $table) {
            $table->dropColumn('vendidas');
        });
    }
};