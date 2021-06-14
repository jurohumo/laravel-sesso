<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('programacion_emo_usuario_id');
            $table->unsignedBigInteger('historia_clinica_id');

            $table->date('fecha_toma')->nullable();
            $table->string('tipo_emo')->nullable();
            $table->string('tipo_protocolo')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('programacion_emo_usuario_id')->references('id')->on('user_programacion_emo')->onDelete('cascade');
            $table->foreign('historia_clinica_id')->references('id')->on('historia_clinica')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emos');
    }
}
