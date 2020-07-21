<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->integer('category')->nullable();
            $table->string('pathfile', 200)->nullable();
            $table->string('name', 140)->nullable();
            $table->string('namefile', 140)->nullable();
            $table->string('creditfile', 240)->nullable();
            $table->string('namefilefull', 240)->nullable();
            $table->string('mimetype', 100)->nullable();
            $table->string('extension', 6)->nullable();
            $table->string('size', 240)->nullable();
            $table->string('type', 20)->nullable();
            $table->string('description', 240)->nullable();
            $table->string('alternativeText', 140)->nullable();

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
        Schema::dropIfExists('files');
    }
}
