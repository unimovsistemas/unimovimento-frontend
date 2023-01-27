<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesPastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_pastas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('nome');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });

        Schema::create('clientes_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->string('arquivo');
            $table->integer('qtd')->default(0);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes_pastas', function (Blueprint $table) {
            $table->dropForeign('clientes_pastas_cliente_id_foreign');;
        });
        Schema::table('clientes_downloads', function (Blueprint $table) {
            $table->dropForeign('clientes_downloads_cliente_id_foreign');;
        });

        Schema::dropIfExists('clientes_downloads');
        Schema::dropIfExists('clientes_pastas');
    }
}
