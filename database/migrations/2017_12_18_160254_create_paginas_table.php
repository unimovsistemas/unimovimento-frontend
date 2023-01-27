<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_id')->index()->unsigned()->nullable();
            $table->string('template')->index()->nullable();
            $table->integer('menu_id')->index()->default(0)->unsigned();
            $table->string('slug');
            $table->string('titulo');
            $table->longText('conteudo')->nullable();
            $table->string('imagem')->nullable();
            $table->date('periodo_inicio')->nullable();
            $table->date('periodo_fim')->nullable();
            $table->smallInteger('active')->default(1);
            $table->integer('ordem')->default(0);
            $table->integer('qtd_cliques')->default(0);
            $table->integer('qtd_views')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pagina_id')->references('id')->on('paginas')->onDelete('cascade');
        });

        Schema::create('paginas_conteudos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_id')->index()->unsigned();
            $table->string('slug')->nullable();
            $table->string('titulo')->nullable();
            $table->longText('resumo')->nullable();
            $table->longText('conteudo')->nullable();
            $table->string('imagem')->nullable();
            $table->text('url_extra')->nullable();
            $table->smallInteger('active')->default(1);
            $table->integer('ordem')->default(0);
            $table->integer('qtd_cliques')->default(0);
            $table->integer('qtd_views')->default(0);
            $table->timestamps();

            $table->foreign('pagina_id')->references('id')->on('paginas')->onDelete('cascade');
        });

        Schema::create('paginas_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_id')->unsigned();
            $table->integer('menu_id')->unsigned();

            $table->foreign('pagina_id')->references('id')->on('paginas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paginas_conteudos', function (Blueprint $table) {
            $table->dropForeign('paginas_conteudos_pagina_id_foreign');
        });
        Schema::table('paginas_menu', function (Blueprint $table) {
            $table->dropForeign('paginas_menu_pagina_id_foreign');
        });
        Schema::table('paginas', function (Blueprint $table) {
            $table->dropForeign('paginas_pagina_id_foreign');
        });

        Schema::dropIfExists('paginas_conteudos');
        Schema::dropIfExists('paginas_menu');
        Schema::dropIfExists('paginas');
    }
}
