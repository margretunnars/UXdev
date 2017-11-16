<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('task_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->string('testuser_id');
            $table->string('start_time');
            $table->string('end_time');
            $table->timestamps();
        });

        Schema::table('task_responses', function($table){
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_responses');
    }
}
