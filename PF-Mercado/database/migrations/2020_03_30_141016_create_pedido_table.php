<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations, add the attribute to the table in the database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('idPedido');
            $table->unsignedInteger('idUsu');
            $table->unsignedInteger('idProPues');
            $table->integer('cantidad');
            $table->integer('peso');
            $table->boolean('pagado');
            $table->timestamp('fecha');
            $table->timestamps();
        });

        Schema::table('pedido', function (Blueprint $table) {
            $table->foreign('idUsu')->references('idUsu')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('pedido', function (Blueprint $table) {
            $table->foreign('idProPues')->references('idProPues')
                ->on('producto_puesto')
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
        Schema::dropIfExists('pedido');
    }
}
