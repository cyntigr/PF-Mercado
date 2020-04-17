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
            $table->increments('idUsu');
            $table->string('name',255);
            $table->string('apellido',200);
            $table->string('email',150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->rememberToken();
            $table->string('telefono',9);
            $table->unsignedInteger('idTipo');
            $table->string('foto',255);
            $table->string('nif',9);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
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
        Schema::dropIfExists('users');
    }
}
