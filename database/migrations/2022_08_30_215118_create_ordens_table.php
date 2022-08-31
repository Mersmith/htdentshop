<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Orden;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
           
            $table->enum('estado', [Orden::PENDIENTE,Orden::RECIBIDO, Orden::ENVIADO, Orden::ENTREGADO, Orden::ANULADO])->default(Orden::PENDIENTE);
            $table->string('contacto');
            $table->string('celular');
            $table->enum('tipo_envio', [1, 2]);
            $table->float('costo_envio');
            $table->float('total');
            $table->json('contenido')->nullable();
            $table->string('direccion')->nullable();
            $table->string('referencia')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->foreign('ciudad_id')->references('id')->on('ciudads');

            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos');

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
        Schema::dropIfExists('ordens');
    }
};
