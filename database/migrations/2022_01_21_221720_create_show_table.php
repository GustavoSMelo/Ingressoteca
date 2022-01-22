<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show', function (Blueprint $table) {
            $table->id();
            $table->string('showName')->nullable(false)->unique(true);
            $table->date('showDate')->nullable(false);
            $table->time('startTime')->nullable(false);
            $table->time('endTime')->nullable(false);
            $table->text('description')->nullable(true);
            $table->string('category')->nullable(false);
            $table->integer('personLimit')->nullable(true);
            $table->unsignedBigInteger('announcerId');
            $table->foreign('announcerId')->references('id')->on('announcers');
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
        Schema::dropIfExists('show');
    }
}
