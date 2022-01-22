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
            $table->string('show_name')->nullable(false)->unique(true);
            $table->date('show_date')->nullable(false);
            $table->time('start_time')->nullable(false);
            $table->time('end_time')->nullable(false);
            $table->text('description')->nullable(true);
            $table->string('category')->nullable(false);
            $table->integer('person_limit')->nullable(true);
            $table->unsignedBigInteger('announcer_id');
            $table->foreign('announcer_id')->references('id')->on('announcers');
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
