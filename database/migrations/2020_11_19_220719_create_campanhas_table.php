<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->id();

            $table->string('name', 240)->nullable();
            $table->string('link', 240)->nullable();
            $table->integer('file')->nullable();
            
            $table->dateTime('dataInclusao', 0)->nullable();
            $table->dateTime('dataLimite', 0)->nullable();
            $table->time('horaLimite', 0)->nullable();
            
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
        Schema::dropIfExists('campanhas');
    }
}
