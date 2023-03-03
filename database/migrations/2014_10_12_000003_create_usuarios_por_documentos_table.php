<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosPorDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_por_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('user_id');
            $table->string('condicion', 16);
            $table->timestamps();
            $table->softDeletes();
            
            //Referencia la cabecera que usa
            $table->foreign('documento_id')->references('id')->on('documentos');
            //Referencia el status que posee
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios_por_documentos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('usuarios_por_documentos');
    }
}
