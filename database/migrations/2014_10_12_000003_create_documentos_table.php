<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabecera_id');
            $table->unsignedBigInteger('status_id');
            $table->text('cuerpo_documento');
            $table->text('cuerpo_documento_unformatted');
            $table->string('descripcion_documento', 256)->nullable();
            $table->timestamp('fecha_emision',0)->nullable();
            $table->timestamps();
            $table->softDeletes();
            //Referencia la cabecera que usa
            $table->foreign('cabecera_id')->references('id')->on('cabeceras');
            //Referencia el status que posee
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('documentos');
    }
}
