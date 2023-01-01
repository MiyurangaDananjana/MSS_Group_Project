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
        Schema::create('inventory_behaviours', function (Blueprint $table) {
            $table->increments('behaviourId');
            $table->integer('itemId')->unsigned();
            $table->string('Description');
            $table->string('quantity');
            $table->timestamps();
            $table->foreign('itemId')->references('itemId')->on('items')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_behaviours');
    }
};
