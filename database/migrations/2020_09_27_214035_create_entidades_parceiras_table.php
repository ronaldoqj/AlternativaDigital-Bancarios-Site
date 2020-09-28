<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesParceirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades_parceiras', function (Blueprint $table) {
            $table->id();

            $table->integer('file')->nullable();
            $table->string('name', 240)->nullable();
            $table->string('link', 240)->nullable();

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
        Schema::dropIfExists('entidades_parceiras');
    }
}
