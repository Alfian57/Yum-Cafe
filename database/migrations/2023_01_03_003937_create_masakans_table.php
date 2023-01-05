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
        Schema::create('masakan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_masakan')->unique();
            // $table->string('type');
            // $table->string('status_masakan');
            $table->enum('type', ['makanan', 'minuman']);
            $table->enum('status_masakan', ['tersedia', 'habis']);
            $table->integer('harga');
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
        Schema::dropIfExists('masakan');
    }
};