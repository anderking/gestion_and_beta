<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecioDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precio_documentos', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('carrera_id')->unsigned();
            $table->integer('documento_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('documento_id')->references('id')->on('documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->float('precio',8,2)->nullable();
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
        Schema::dropIfExists('precio_documentos');
    }
}
