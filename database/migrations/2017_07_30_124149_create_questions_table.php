<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('creator_id')->unsigned();
            $table->string('question');
            $table->boolean('likert_scale');
            $table->timestamps();
        });

        Schema::table('questions', function($table){
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
        Schema::dropIfExists('questions');
    }
}
