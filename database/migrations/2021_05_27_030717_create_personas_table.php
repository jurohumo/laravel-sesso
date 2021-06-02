<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->unsignedBigInteger('numero_documento');
            $table->unsignedBigInteger('cargo_id');
            $table->unsignedInteger('cmp_cep')->nullable();
            $table->string('nombres');
            $table->string('apellido_pat')->nullable();
            $table->string('apellido_mat')->nullable();
            $table->unsignedBigInteger('sexo_id');
            $table->bigInteger('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documento');
            $table->foreign('cargo_id')->references('id')->on('cargo');
            $table->foreign('sexo_id')->references('id')->on('sexo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
