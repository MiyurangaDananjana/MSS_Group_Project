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
        Schema::create('task_lists', function (Blueprint $table) {
            $table->increments('TaskId');
            $table->longText('TaskDescription');
            $table->string('TaskName');
            $table->integer('createdUser');
            $table->integer('supervicer');
            $table->integer('factory');
            $table->integer('Status');
            $table->integer('Progress');
            $table->dateTime('Deadline');
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
        Schema::dropIfExists('task_lists');
    }
};
