<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();

            $table->string('name', 240)->nullable();
            $table->string('email', 240)->nullable();
            $table->integer('entidade')->nullable();
            $table->integer('categoria')->nullable();
            $table->text('description')->nullable();
            $table->string('site', 240)->nullable();
            $table->string('facebook', 240)->nullable();
            $table->string('twitter', 240)->nullable();
            $table->string('instagram', 240)->nullable();
            $table->string('whatsapp', 240)->nullable();
            $table->string('cep', 14)->nullable();
            $table->string('endereco', 240)->nullable();
            $table->string('numero', 30)->nullable();
            $table->string('complemento', 240)->nullable();
            $table->string('bairro', 240)->nullable();
            $table->string('cidade', 240)->nullable();
            $table->string('uf', 240)->nullable();

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
        Schema::dropIfExists('convenios');
    }
}
