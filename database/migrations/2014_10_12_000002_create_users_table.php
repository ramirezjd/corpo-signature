<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departamento_id');
            // $table->unsignedBigInteger('firma'); // Si se usa esto no se hace filtro por la mas reciente al crear el doc
            $table->string('nombres_usuario', 128);
            $table->string('apellidos_usuario', 128);
            $table->string('documento_usuario', 16);
            $table->string('email')->unique();
            $table->string('base64')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            
            //Referencia del departamento al que pertenece
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
