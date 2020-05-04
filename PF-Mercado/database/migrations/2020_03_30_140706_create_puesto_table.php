<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestoTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto', function (Blueprint $table) {
            $table->increments('idPuesto');
            $table->string('nombre',150);
            $table->unsignedInteger('idUsu');
            $table->string('foto',255);
            $table->string('telefono',9);
            $table->string('info',300);
            $table->timestamps();
        });

        Schema::table('puesto', function(Blueprint $table) {
            $table->foreign('idUsu')->references('idUsu')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations and drop the table in the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puesto');
    }
}
