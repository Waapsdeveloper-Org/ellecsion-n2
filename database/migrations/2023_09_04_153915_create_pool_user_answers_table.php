<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_user_answers', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('pool_user_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pool_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->string('answer');
            $table->timestamps();

            // Define foreign key constraints
//            $table->foreign('pool_user_id')->references('id')->on('pool_users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pool_id')->references('id')->on('pools');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('answer_id')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_user_answers');
    }
};
