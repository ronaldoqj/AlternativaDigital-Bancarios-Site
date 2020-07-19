<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            
            $table->char('ativo', 1)->default('N');
            $table->string('tipoDaNoticia', 240)->nullable();
            $table->string('titulo', 240)->nullable();
            $table->string('subtitulo', 240)->nullable();
            $table->string('cartola', 240)->nullable();
            $table->string('tags', 240)->nullable();
            $table->string('linhaDeApoio', 240)->nullable();
            $table->text('texto')->nullable();
            $table->string('jornalistaResponsavel', 240)->nullable();
            
            $table->integer('bannerDestaque')->nullable();
            $table->integer('imagemDestaque')->nullable();
            $table->integer('filePodcast')->nullable();
            $table->string('videoYoutube', 240)->nullable();
            
            $table->timestamp('dataInclusao', 0)->nullable();
            $table->timestamp('dataLimiteNoDestaque', 0)->nullable();
            $table->time('horaLimiteNoDestaque', 0)->nullable();
            
            $table->string('ativarNosSindicatos', 240)->nullable();
            
            $table->integer('userIdCreated')->nullable();
            $table->integer('userIdUpdated')->nullable();

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
        Schema::dropIfExists('noticias');
    }
}
