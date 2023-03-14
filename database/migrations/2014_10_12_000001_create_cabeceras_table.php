<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabecerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabeceras', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cabecera', 128);
            $table->string('cuerpo_cabecera', 512);
            $table->string('img_path', 256)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cabeceras', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('cabeceras');
    }
}
