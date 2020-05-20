<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoPuestoTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_puesto', function (Blueprint $table) {
            $table->increments('idProPues');
            $table->unsignedInteger('idPuesto');
            $table->string('nombre',255);
            $table->string('foto',255);
            $table->string('descripcion',200);
            $table->double('precio');
            $table->boolean('stock');
            $table->timestamps();
        });

        Schema::table('producto_puesto', function (Blueprint $table){
            $table->foreign('idPuesto')->references('idPuesto')
                ->on('puesto')
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
        Schema::dropIfExists('producto_puesto');
    }
}
