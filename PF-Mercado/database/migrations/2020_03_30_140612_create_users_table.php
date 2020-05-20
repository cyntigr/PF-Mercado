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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('idUsu');
            $table->string('nombre',255);
            $table->string('apellido',255);
            $table->string('dni',9)->unique();
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->rememberToken();
            $table->string('telefono',9);
            $table->date('fecNac');
            $table->unsignedInteger('idTipo');
            $table->boolean('vendedor');
            $table->string('direccion',300);
            $table->bigInteger('tarjeta')->nullable();
            $table->string('caducidad',7)->nullable();
            $table->integer('cvc')->nullable();
            $table->string('foto',255);
            $table->string('nif',9)->nullable();
            $table->string('apiKey',32)->nullable();
            $table->timestamps();
            
        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('idTipo')->references('idTipo')
                ->on('tipo')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
