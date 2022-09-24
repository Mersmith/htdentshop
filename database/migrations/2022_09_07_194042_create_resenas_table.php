<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('resenas', function (Blueprint $table) {
            $table->id();

            $table->text('comentario');
            $table->integer('puntaje');

            $table->unsignedBigInteger('padre_id')->nullable();
            $table->foreign('padre_id', 'fk_resena_resena')->references('id')->on('resenas')->onDelete('cascade');

            //$table->integer('padre_id')->unsigned()->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

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
        Schema::dropIfExists('resenas');
    }
};
