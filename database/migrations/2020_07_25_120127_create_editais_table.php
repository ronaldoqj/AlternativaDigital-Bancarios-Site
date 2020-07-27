<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editais', function (Blueprint $table) {
            $table->id();

            $table->char('ativo', 1)->default('N');
            $table->string('cartola', 240)->nullable();
            $table->string('titulo', 240)->nullable();
            $table->string('subtitulo', 240)->nullable();
            $table->string('tags', 240)->nullable();
            $table->string('linhaDeApoio', 240)->nullable();
            $table->string('jornalistaResponsavel', 240)->nullable();
            
            $table->integer('bannerDestaque')->nullable();
            $table->integer('file')->nullable();
            
            $table->timestamp('dataInclusao', 0)->nullable();
            $table->timestamp('dataLimiteNoDestaque', 0)->nullable();
            $table->time('horaLimiteNoDestaque', 0)->nullable();
            
            $table->integer('ativarNosSindicatos')->nullable();
            
            $table->integer('userIdCreated')->nullable();
            $table->integer('userIdUpdated')->nullable();

            $table->softDeletes();

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
        Schema::dropIfExists('editais');
    }
}
