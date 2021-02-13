<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();

            $table->char('fetrafi', 2)->nullable()
                                      ->comment('[ Sigla da UF(Atualmente só tem para o RS) ]');
            $table->integer('entity')->nullable()
                                     ->comment('[ Caso seja NULL Pertence ao Portal dos Sindicatos ]');
            
            $table->string('title', 240)->nullable();
            $table->text('texto')->nullable();
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
        Schema::dropIfExists('servicos');
    }
}
