<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsAssignedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions_assigned', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('entity', 240)->comment('[ portal, fetrafi-rs, syndicate ]');
            $table->foreignId('permission_id');
            $table->foreignId('syndicate_id')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('syndicate_id')->references('id')->on('sindicatos');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_assigned');
    }
}
