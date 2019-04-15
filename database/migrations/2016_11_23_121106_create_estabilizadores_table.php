<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabilizadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabilizadores', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nome');
            $table->string('codigo_produto')->nullable();
            $table->integer('potencia_va')->nullable();
            $table->integer('potencia_w')->nullable();
            $table->integer('potencia_kva')->nullable();
            $table->integer('potencia_va_min')->nullable();
            $table->integer('potencia_va_max')->nullable();
            $table->integer('potencia_kva_min')->nullable();
            $table->integer('potencia_kva_max')->nullable();
            $table->integer('tomadas')->nullable();
            $table->string('dimensoes')->nullable();
            $table->string('catalogo')->nullable();
            $table->string('manual')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->text('especificacao')->nullable();
            $table->text('protecoes')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('foto_principal')->nullable();
            $table->string('slug')->nullable();

            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')
                  ->references('id')->on('marcas')
                  ->onDelete('cascade');

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
        Schema::drop('estabilizadores');
    }
}
