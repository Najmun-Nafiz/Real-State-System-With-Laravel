<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('house_category_id')->unsigned();
            $table->string('name');
            $table->string('rate');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('postal_code');
            $table->string('property_id');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('garaze_space');
            $table->string('year');
            $table->string('property_space');
            $table->string('garaze');
            $table->text('content');
            $table->string('image');
            $table->boolean('status');
            $table->foreign('house_category_id')->references('id')->on('house_categories')->onDelete('cascade');

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
        Schema::dropIfExists('house_details');
    }
}
