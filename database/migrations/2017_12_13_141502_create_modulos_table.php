<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('public_code');
            $table->smallInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users_rel_modulos', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');

            $table->smallInteger('allow_view')->default(0);
            $table->smallInteger('allow_manage')->default(0);
            $table->smallInteger('allow_delete')->default(0);

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
        Schema::table('users_rel_modulos', function (Blueprint $table) {
            $table->dropForeign('users_rel_modulos_user_id_foreign');
            $table->dropForeign('users_rel_modulos_modulo_id_foreign');
        });

        Schema::dropIfExists('modulos');
        Schema::dropIfExists('users_rel_modulos');
    }
}
