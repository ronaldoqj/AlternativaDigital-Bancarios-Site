<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->id();

            $table->string('code', 120)->nullable();
            $table->string('name', 120)->nullable();
            $table->string('description', 240)->nullable();
            $table->string('endereco', 240)->nullable();
            $table->string('cidade', 240)->nullable();
            $table->string('estado', 240)->nullable();
            $table->string('regiao', 240)->nullable();

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
        Schema::dropIfExists('entidades');
    }
}
