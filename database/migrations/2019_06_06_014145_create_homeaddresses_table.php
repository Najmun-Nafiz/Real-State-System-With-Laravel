<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeaddresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('home_id')->unsigned();
            $table->string('address');
            $table->text('neighborhood');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->boolean('status');
            $table->foreign('home_id')->references('id')->on('homedetails')->onDelete('cascade');
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
        Schema::dropIfExists('homeaddresses');
    }
}
