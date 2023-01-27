<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local')->default(0);
            $table->string('titulo');
            $table->date('periodo_inicio')->nullable();
            $table->date('periodo_fim')->nullable();
            $table->text('url')->nullable();
            $table->string('imagem')->nullable();
            $table->integer('qtd_cliques')->default(0);
            $table->integer('qtd_views')->default(0);
            $table->integer('ordem')->default(0);
            $table->smallInteger('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
