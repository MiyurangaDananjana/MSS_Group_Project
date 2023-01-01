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
        
        Schema::create('access_levels', function (Blueprint $table) {
            $table->increments('AccessLevelID');
            $table->BigInteger('user_id')->unsigned();
            $table->integer('Finanace_Module');
            $table->integer('purchasingModule');
            $table->integer('factoryModule');
            $table->integer('Reports');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_levels');
    }
};
