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
            $table->string('primer_nombre_usuario', 30);
            $table->string('segundo_nombre_usuario', 30)->nullable();
            $table->string('primer_apellido_usuario', 30);
            $table->string('segundo_apellido_usuario', 30);
            $table->string('documento_usuario', 16);
            $table->string('email')->unique();
            $table->bigInteger('rol');
            $table->string('roleName');
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
