<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_organizations', function (Blueprint $table) {
            $table->id('partner_id');
            $table->string('partner_name');
            $table->string('partner_picture');
            $table->string('address_organization');
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
        Schema::dropIfExists('partner_organizations');
    }
}
