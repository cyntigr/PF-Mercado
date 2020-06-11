<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritoTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('favorito', function (Blueprint $table) {
            $table->unsignedInteger('idUsu');
            $table->unsignedInteger('idPuesto');
            $table->primary(['idUsu', 'idPuesto']);
        });

        Schema::table('favorito', function (Blueprint $table) {
            $table->foreign('idUsu')->references('idUsu')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('favorito', function (Blueprint $table) {
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
        Schema::dropIfExists('favorito');
    }
}
