<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dining_name');
            $table->string('drawing_name');
            $table->string('kitchen_name');
            $table->string('bed_name');
            $table->text('content');
            $table->string('dining')->default('default.png');
            $table->string('drawing')->default('default.png');
            $table->string('kitchen')->default('default.png');
            $table->string('bed')->default('default.png');
            $table->boolean('status');
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
        Schema::dropIfExists('properties');
    }
}
