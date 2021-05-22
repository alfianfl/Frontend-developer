<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificCommitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_commites', function (Blueprint $table) {
            $table->id('scientific_id');
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
        Schema::dropIfExists('scientific_commites');
    }
}
