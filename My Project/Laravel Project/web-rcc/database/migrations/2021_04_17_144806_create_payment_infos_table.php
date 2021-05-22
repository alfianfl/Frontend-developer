<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_info', function (Blueprint $table) {
            $table->id('Konfirmasi_id');
            $table->string('nomor_rekening');
            $table->string('nomor_akun');
            $table->string('nama_akun');
            $table->string('nama_bank');
            $table->string('swift_code');
            $table->string('alamat_bank');
            $table->bigInteger('pesanan_id')->unsigned();
            $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('payment_infos');
    }
}
