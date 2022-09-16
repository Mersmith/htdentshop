<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();

            $table->string('codigo')->unique();
            $table->enum('tipo', ['fijo', 'porcentaje']);
            $table->decimal('descuento')->unique();
            $table->decimal('carrito_monto');
            $table->date('fecha_expiracion')->default(DB::raw('CURRENT_DATE'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupons');
    }
};
