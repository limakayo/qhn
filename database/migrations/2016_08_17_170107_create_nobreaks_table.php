<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNobreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nobreaks', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nome');
            $table->string('codigo_produto')->nullable();
            $table->integer('potencia_va')->nullable();
            $table->integer('potencia_kva')->nullable();
            $table->integer('potencia_va_min')->nullable();
            $table->integer('potencia_va_max')->nullable();
            $table->integer('potencia_kva_min')->nullable();
            $table->integer('potencia_kva_max')->nullable();
            $table->integer('potencia_w')->nullable();
            $table->string('autonomia')->nullable();
            $table->integer('tomadas')->nullable();
            $table->string('baterias')->nullable();
            $table->string('exp_bateria')->nullable();
            $table->string('dimensoes')->nullable();
            $table->string('catalogo')->nullable();
            $table->string('manual')->nullable();
            $table->text('caracteristicas')->nullable();
            $table->text('especificacao')->nullable();
            $table->text('protecoes')->nullable();
            $table->text('modelos')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('foto_principal')->nullable();
            $table->string('slug')->nullable();

            $table->integer('linha_id')->unsigned();
            $table->foreign('linha_id')
                  ->references('id')->on('linhas')
                  ->onDelete('cascade');

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
        Schema::drop('nobreaks');
    }
}
