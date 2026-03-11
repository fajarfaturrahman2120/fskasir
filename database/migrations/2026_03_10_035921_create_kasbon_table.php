<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kasbon', function (Blueprint $table) {
            $table->id('id_kasbon');
            $table->unsignedBigInteger('id_toko');
            $table->integer('jumlah_kasbon');
            $table->string('nama_pengkasbon');
            $table->string('jenis_kasbon');
            $table->string('pembayaran_kasbon');
            $table->string('keterangan_kasbon');
            $table->date('tanggal_kasbon');
            $table->integer('cicilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasbon');
    }
};
