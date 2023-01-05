<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_pesanan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_meja');
            $table->integer('total_harga');
            $table->integer('bayar');
            $table->integer('kembali');
            $table->boolean('status_pesanan');
            // $table->string('status_makanan_pesanan');
            $table->enum('status_makanan_pesanan', ['sedang diproses', 'siap antar', 'telah tersaji', 'telah dibawa pulang']);
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_meja')->references('id')->on('meja')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
};