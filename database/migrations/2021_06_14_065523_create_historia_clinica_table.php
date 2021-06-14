<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaClinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_clinica', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('general_id')->nullable();
            $table->unsignedBigInteger('aparato_respiratorio_id')->nullable();
            $table->unsignedBigInteger('radiografias_id')->nullable();
            $table->unsignedBigInteger('sistema_auditivo_id')->nullable();
            $table->unsignedBigInteger('psicologia_id')->nullable();
            $table->unsignedBigInteger('odontologia_id')->nullable();
            $table->unsignedBigInteger('sistema_oftalmologico_id')->nullable();
            $table->unsignedBigInteger('dermatologia_id')->nullable();
            $table->unsignedBigInteger('electrocardiograma_id')->nullable();
            $table->unsignedBigInteger('triaje_id')->nullable();
            $table->unsignedBigInteger('hemograma_id')->nullable();
            $table->unsignedBigInteger('endocrinologia_id')->nullable();
            $table->unsignedBigInteger('covid_id')->nullable();
            $table->unsignedBigInteger('inmunologia_id')->nullable();
            $table->unsignedBigInteger('examen_orina_id')->nullable();
            $table->unsignedBigInteger('toxicologia_id')->nullable();
            $table->unsignedBigInteger('dx_medico_general_id')->nullable();
            $table->unsignedBigInteger('recomendaciones_id')->nullable();
            $table->unsignedBigInteger('restricciones_id')->nullable();

            $table->string('estado')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historia_clinica');
    }
}
