<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal', function (Blueprint $table) {
            $table->id();
            $table->string('facebook', 240)->nullable();
            $table->string('twitter', 240)->nullable();
            $table->string('instagram', 240)->nullable();
            $table->string('whatsapp', 240)->nullable();
            $table->string('podcast', 240)->nullable();
            $table->string('youtube', 240)->nullable();
            $table->string('fone', 20)->nullable();
            $table->string('fone2', 20)->nullable();
            $table->string('email', 240)->nullable();
            $table->string('cep', 14)->nullable();
            $table->string('endereco', 240)->nullable();
            $table->string('numero', 30)->nullable();
            $table->string('complemento', 240)->nullable();
            $table->string('bairro', 240)->nullable();
            $table->string('cidade', 240)->nullable();
            $table->string('uf', 240)->nullable();

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
        Schema::dropIfExists('portal');
    }
}