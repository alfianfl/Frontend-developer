<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbstractPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abstract_papers', function (Blueprint $table) {
            $table->id('abstract_id');
            $table->string('abstract');
            $table->string('status');
            $table->text('title');
            $table->string('Author');
            $table->bigInteger('id')->unsigned();
            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('abstract_papers');
    }
}
