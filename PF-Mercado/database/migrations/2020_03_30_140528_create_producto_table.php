<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('idPro');
            $table->string('nombre',255);
            $table->string('foto',255);
        });
    }

    /**
     * Reverse the migrations and drop the table in the database.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
