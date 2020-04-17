<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetaTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta', function (Blueprint $table) {
            $table->increments('idTarjeta');
            $table->string('titular');
            $table->string('numero',16);
            $table->integer('cvc');
            $table->unsignedInteger('idUsu');
        });

        Schema::table('tarjeta', function (Blueprint $table) {
            $table->foreign('idUsu')->references('idUsu')
                ->on('usuario')
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
        Schema::dropIfExists('tarjeta');
    }
}
