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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_masakan');
            $table->integer('qty');
            $table->integer('sub_total');
            $table->text('keterangan_pesanan');
            // $table->string('status_detail_masakan');
            $table->enum('status_detail_masakan', ['dimasak', 'sudah siap']);
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id')->on('pesanan')->cascadeOnDelete();
            $table->foreign('id_masakan')->references('id')->on('masakan')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pesanan');
    }
};