<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->string('name');
            $table->string('instructions');
            $table->string('start_url');
            $table->string('end_url');
            $table->integer('max_time');
            $table->timestamps();
        });

        Schema::table('tasks', function($table){
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('creator_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
