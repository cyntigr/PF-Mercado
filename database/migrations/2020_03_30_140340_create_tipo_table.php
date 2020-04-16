<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->increments('idTipo');
            $table->string('nombre',100);
        });
    }

    /**
     * Reverse the migrations and drop the table in the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo');
    }
}
