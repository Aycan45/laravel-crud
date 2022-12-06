<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webstream', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('description',655);
            $table->integer('tokens_price');
            $table->integer('type')->references('id')->on('stream_types');
            $table->dateTime('date_expiration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webstream');
    }
}
