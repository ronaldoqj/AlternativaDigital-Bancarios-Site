<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalSindicatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_sindicatos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 240);
            $table->integer('logo')->nullable();
            $table->integer('imagem')->nullable();
            $table->integer('banner')->nullable();
            $table->string('titulo', 240)->nullable();
            $table->string('subtitulo', 240)->nullable();
            $table->string('descricao', 240)->nullable();
            $table->text('texto')->nullable();
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
        Schema::dropIfExists('portal_sindicatos');
    }
}
