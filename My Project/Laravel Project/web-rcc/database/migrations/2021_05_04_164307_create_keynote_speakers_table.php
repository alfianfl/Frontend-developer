<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeynoteSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keynote_speakers', function (Blueprint $table) {
            $table->id('keynote_id');
            $table->string('image');
            $table->string('institution');
            $table->string('name');
            $table->bigInteger('conference_id')->unsigned();
            $table->foreign('conference_id')->references('conference_id')->on('conferences')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('keynote_speakers');
    }
}
