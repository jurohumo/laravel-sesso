<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_cliente_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('ciiu_id');
            $table->unsignedBigInteger('ruc')->unique();
            $table->string('razon_social');
            $table->string('sigla');
            $table->unsignedInteger('telefono_01')->nullable();
            $table->unsignedInteger('telefono_02')->nullable();
            $table->string('pais');
            $table->string('departamento');
            $table->string('provincia');
            $table->string('distrito');
            $table->string('direccion');
            $table->string('correo');
            $table->string('host')->nullable();
            $table->string('urlimage')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tipo_cliente_id')->references('id')->on('tipo_cliente');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('ciiu_id')->references('id')->on('ciiu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
