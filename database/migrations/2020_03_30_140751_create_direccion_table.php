<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->increments('idDir');
            $table->string('calle',255);
            $table->integer('cp');
            $table->integer('numero');
            $table->string('letra',3);
            $table->string('municipio',150);
            $table->string('provincia',150);
            $table->unsignedInteger('idUsu');
        });

        Schema::table('direccion', function (Blueprint $table) {

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
        Schema::dropIfExists('direccion');
    }
}
