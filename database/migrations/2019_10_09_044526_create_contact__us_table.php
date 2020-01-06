<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact__us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('local');
            $table->string('phone');
            $table->string('email');
            $table->string('web_address');
            $table->text('content');
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
        Schema::dropIfExists('contact__us');
    }
}
