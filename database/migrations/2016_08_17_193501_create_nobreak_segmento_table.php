<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNobreakSegmentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nobreak_segmento', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('nobreak_id')->unsigned();
            $table->foreign('nobreak_id')->references('id')->on('nobreaks')->onDelete('cascade');
            $table->integer('segmento_id')->unsigned();
            $table->foreign('segmento_id')->references('id')->on('segmentos')->onDelete('cascade');
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
        Schema::drop('nobreak_segmento');
    }
}
