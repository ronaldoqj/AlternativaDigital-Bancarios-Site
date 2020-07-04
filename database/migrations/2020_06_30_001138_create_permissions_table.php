<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('modulo')->nullable();
            $table->string('functionality')->nullable();
            $table->smallInteger('weight')->default(27)->comment('[ denied = 0,
                                                                    view = 1,
                                                                    insert = 5,
                                                                    edit = 7,
                                                                    delete = 14,
                                                                    all = 27 ]');
            $table->char('denied', 1)->default('N');
            $table->char('view', 1)->default('N');
            $table->char('insert', 1)->default('N');
            $table->char('edit', 1)->default('N');
            $table->char('delete', 1)->default('N');
            $table->char('all', 1)->default('N');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
